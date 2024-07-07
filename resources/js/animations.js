import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Lenis from 'lenis';

gsap.registerPlugin(ScrollTrigger);

class Animations {
    nameLessOnScrollCounter = 0;

    standard = [];
    timeline = {};
    onScroll = {};

    defaultDuration = 0.2;
    defaultStagger = 0.03;

    constructor() {
        this.init();
    }

    init() {
        document.addEventListener('DOMContentLoaded', () => {
            this.startSmoothScroll();

            document.querySelectorAll('[animate]').forEach((element) => {
                const animationType = element.getAttribute('animate');

                this.disableTransition(element);
                
                if (element.hasAttribute('animate-onscroll')) {
                    try {
                        let animationOnScrollName = element.getAttribute('animate-onscroll');

                        if (!animationOnScrollName) {
                            animationOnScrollName = this.nameLessOnScrollCounter;
                            this.nameLessOnScrollCounter++;
                        }

                        if (!this.onScroll[animationOnScrollName]) {
                            this.onScroll[animationOnScrollName] = [];
                        }
                        
                        this.onScroll[animationOnScrollName].push([element, animationType]);
                    } catch (e) {
                        console.error(e);
                    }
                } else if (element.hasAttribute('animate-timeline')) {
                    try {
                        const animationTimelineName = element.getAttribute('animate-timeline');

                        if (!this.timeline[animationTimelineName]) {
                            this.timeline[animationTimelineName] = [];
                        }

                        this.timeline[animationTimelineName].push([element, animationType]);
                    } catch (e) {
                        console.error(e);
                    }
                } else {
                    try {
                        this.standard.push([element, animationType]);
                    } catch (e) {
                        console.error(e);
                    }
                }
            });
            
            document.querySelectorAll('[animate-bubbles]').forEach((element) => {
                this.bubbles(element);
            });

            this.startStandardAnimations();
            this.startTimelineAnimations();
            this.startOnscrollAnimations();
        });
    }

    /**
     * Initialise animations
     */
    startOnscrollAnimations() {
        Object.entries(this.onScroll).forEach(([animationName, elements]) => {
            const trigger = document.querySelector(`[animate-onscroll\\.trigger="${animationName}"]`) ?? elements[0][0];
            const start = trigger.getAttribute('animate-onscroll.start') ?? 'top 90%';
            const end = trigger.getAttribute('animate-onscroll.end') ?? 'top 30%';
            const pin = trigger.hasAttribute('animate-onscroll.pin');
            const timeline = gsap.timeline({
                scrollTrigger: {
                    trigger,
                    start,
                    end,
                    scrub: 1,
                    pin
                    // markers: true,
                }
            });

            elements.forEach(([element, type]) => {
                this.addToTimeline(timeline, element, type);
            });
        });
    }

    startSmoothScroll() {
        const isSmoothScroll = document.querySelector(['[data-smooth-scroll]']);

        if (isSmoothScroll) {
            const lenis = new Lenis({
                duration: 1.8
            })

            function raf(time) {
                lenis.raf(time)
                requestAnimationFrame(raf)
            }

            requestAnimationFrame(raf)
        }
    }

    startStandardAnimations() {
        this.standard.forEach(([element, type, duration]) => {
            this[type](element, duration);
        });
    }

    startTimelineAnimations() {
        Object.entries(this.timeline).forEach(([timelineName, elements]) => {
            const timeline = gsap.timeline();
            
            elements.forEach(([element, type]) => {
                this.addToTimeline(timeline, element, type);
            });
        });
    }

    /**
     * Animation types
     */
    bubbles(element) {
        let debounce = null;
        let [bubbles, animations] = this.drawBubbles(element);
        
        window.addEventListener('resize', () => {
            clearTimeout(debounce);
            debounce = setTimeout(() => {
                bubbles.forEach((bubble) => {
                    bubble.remove();
                });
                animations.forEach((animation) => {
                    animation.kill();
                });

                [bubbles, animations] = this.drawBubbles(element);
            }, 500);
        });
    }
    

    clipOut(element, GSAP = gsap) {
        const options = this.getOptions(element);

        GSAP.to(element, { clipPath: 'polygon(0 100%, 100% 100%, 100% 100%, 0% 100%)', opacity: 0, ease: 'power2.out', ...options });

    }
    clipRiseIn(element, GSAP = gsap) {
        const options = this.getOptions(element);

        GSAP.from(element, { 
            clipPath: 'polygon(0 100%, 100% 100%, 100% 100%, 0% 100%)', 
            y: '50%',
            opacity: 0,
            ease: 'power2.out',
            ...options 
        });
    }

    clipRevealRTL(element, GSAP = gsap) {
        const options = this.getOptions(element);

        GSAP.from(element, {
            clipPath: 'polygon(100% 0, 100% 0, 100% 100%, 100% 100%)',
            opacity: 0,
            x: '50%',
            ease: 'power2.out',
            ...options
        });
    }

    fadeDropGrowIn(element, GSAP = gsap) {
        const options = this.getOptions(element);

        GSAP.from(element, { opacity: 0, scale: 0, y: '-25vh', ...options });
    }

    fadeGrowIn(element, GSAP = gsap) {
        const options = this.getOptions(element);
        
        GSAP.from(element, { opacity: 0, scale: 0.8, ...options });
    }

    fadeRiseShrinkOut(element, GSAP = gsap) {
        const options = this.getOptions(element);

        GSAP.to(element, { opacity: 0, scale: 0, y: '-25vh', ...options });
    }

    fadeIn(element, GSAP = gsap) {
        const options = this.getOptions(element);

        GSAP.from(element, { opacity: 0, ...options });
    }

    fadeOut(element, GSAP = gsap) {
        const options = this.getOptions(element);

        GSAP.to(element, { opacity: 0, ...options });
    }

    fadeDropTextIn(element, GSAP = gsap) {
        this.splitText(element);
        const chars = element.querySelectorAll('.char');
        const options = this.getOptions(element, true);

        GSAP.from(chars, { opacity: 0, y: '-150%', ...options });
    }

    fadeRiseTextIn(element, GSAP = gsap) {
        this.splitText(element);
        const chars = element.querySelectorAll('.char');
        const options = this.getOptions(element, true);
        const duration = element.getAttribute('animate-duration') ?? this.defaultDuration;

        GSAP.from(chars, { opacity: 0, y: '150%', ...options });
    }

    fadeTextIn(element, GSAP = gsap) {
        this.splitText(element);
        const chars = element.querySelectorAll('.char');
        const options = this.getOptions(element, true);

        GSAP.from(chars, { opacity: 0, ...options });
    }

    parallax(element, GSAP = gsap) {
        const options = this.getOptions(element);

        GSAP.to(element, { y: '-100vh', ease: 'none', ...options });
    }

    slideInLeft(element, GSAP = gsap) {
        const options = this.getOptions(element);

        GSAP.from(element, { x: '-100vw', ease: 'power2.out', ...options });
    }

    /**
     * Helper functions
     */
    addToTimeline(timeline, element, type) {
        this[type](element, timeline);
    }

    disableTransition(element) {
        element.style.transition = 'none';
    }

    drawBubbles(element) {
        const animations = [];
        const bubbles = [];
        const pinSpacer = element.closest('.pin-spacer');
        const { width: elementWidth, height: elementHeight } = element.getBoundingClientRect();
        const sizes = ['w-4 h-4', 'w-6 h-6', 'w-8 h-8', 'w-10 h-10', 'w-12 h-12', 'w-14 h-14', 'w-16 h-16', 'w-18 h-18', 'w-20 h-20', 'w-22 h-22', 'w-24 h-24', 'w-26 h-26', 'w-28 h-28', 'w-30 h-30', 'w-32 h-32'];
    
        for (let i = 0; i < 50; i++) {
            const bubble = document.createElement('div');
    
            bubble.classList.add('absolute', 'bg-black/5', 'rounded-full', 'animate-pulse', 'dark:bg-white/5');
            bubble.classList.add(...sizes[Math.floor(Math.random() * sizes.length)].split(' '));
    

            bubble.style.top = `calc(100vh + ${Math.floor(Math.random() * elementHeight)}px)`;
            bubble.style.left = `${Math.floor(Math.random() * elementWidth)}px`;
    
            const speed = Math.random() * 2 + 0.5;
    
            animations.push(gsap.to(bubble, {
                scrollTrigger: {
                    trigger: pinSpacer ?? bubble,
                    start: pinSpacer ? 'top top' : 'top bottom',
                    end: pinSpacer ? 'bottom top' : 'bottom top',
                    scrub: true,
                    invalidateOnRefresh: true,
                },
                y: `-=${100 * speed}vh`,
                ease: 'none',
            }));
    
            bubbles.push(bubble);
            element.appendChild(bubble);
        }
    
        return [bubbles, animations];
    }

    enableTransition(element) {
        element.style.transition = '';
    }

    getOptions(element, isStaggered = false) {
        const duration = element.getAttribute('animate-duration') ?? this.defaultDuration;
        const stagger = isStaggered ? element.getAttribute('animate-stagger') ?? this.defaultStagger : 0;

        return {
            duration,
            stagger,
            onComplete: () => {
                this.enableTransition(element);
            },
        };
    }

    splitText(element) {
        if (!element) {
            console.error('Element is null or undefined.');
            return;
        }
        
        if (element.nodeType === Node.TEXT_NODE) {
            const text = element.textContent.trim();
            const words = text.split(/\s+/);
            
            const newHtml = words.map((word) => {
                const chars = word.split('').map((char) => {
                    return `<span class="char">${char}</span>`;
                }).join('');
                return `<span class="word">${chars}</span>`;
            }).join(' ');
    
            const tempContainer = document.createElement('span');
            tempContainer.innerHTML = newHtml;
            
            const parent = element.parentNode;
            if (parent) {
                parent.replaceChild(tempContainer, element);
            }
        } else if (element.nodeType === Node.ELEMENT_NODE) {
            element.childNodes.forEach((node) => {
                this.splitText(node);
            });
        } else {
            console.warn('Unhandled node type:', element.nodeType);
        }
    }
}

new Animations();