import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

class Animations {
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
            document.querySelectorAll('[animate]').forEach((element) => {
                const animationType = element.getAttribute('animate');
                const animationDuration = element.getAttribute('animate-duration') ?? this.defaultDuration;
                
                if (element.hasAttribute('animate-onscroll')) {
                    try {
                        const animationOnScrollName = element.getAttribute('animate-onscroll');
                        
                        this.onScroll[animationOnScrollName] = [element, animationType];
                    } catch (e) {
                        console.error(e);
                    }
                } else if (element.hasAttribute('animate-timeline')) {
                    try {
                        const animationTimelineName = element.getAttribute('animate-timeline');

                        if (!this.timeline[animationTimelineName]) {
                            this.timeline[animationTimelineName] = [];
                        }

                        this.timeline[animationTimelineName] .push([element, animationType]);
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

            this.startStandardAnimations();
            this.startTimelineAnimations();
        });
    }

    /**
     * Initialise animations
     */
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
    fadeInGrow(element, GSAP = gsap) {
        const options = this.getOptions(element);
        
        GSAP.from(element, { opacity: 0, scale: 0.8, ...options });
    }

    fadeIn(element, GSAP = gsap) {
        const options = this.getOptions(element);
        GSAP.from(element, { opacity: 0, ...options });
    }

    fadeDropTextIn(element, GSAP = gsap) {
        this.splitText(element);
        const chars = element.querySelectorAll('.char');
        const options = this.getOptions(element, true);

        GSAP.from(chars, { opacity: 0, y: '-150%', ...options });
    }

    fadeTextIn(element, GSAP = gsap) {
        this.splitText(element);
        const chars = element.querySelectorAll('.char');
        const options = this.getOptions(element, true);

        GSAP.from(chars, { opacity: 0, ...options });
    }

    slideInLeft(element, GSAP = gsap) {
        const options = this.getOptions(element);
        // easing options
        GSAP.from(element, { x: '-100vw', ease: 'power2.out', ...options });
    }

    /**
     * Helper functions
     */
    addToTimeline(timeline, element, type) {
        this[type](element, timeline);
    }

    getOptions(element, isStaggered = false) {
        const duration = element.getAttribute('animate-duration') ?? this.defaultDuration;
        const stagger = isStaggered ? element.getAttribute('animate-stagger') ?? this.defaultStagger : 0;

        return {
            duration,
            stagger,
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