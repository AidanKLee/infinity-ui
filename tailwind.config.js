/** @type {import('tailwindcss').Config} */

const defaultTheme = require("tailwindcss/defaultTheme");

export default {
    content: [
        "./resources/**/*.{js,blade.php}",
        "./app/Models/**/*.php",
        "./app/Livewire/**/*.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            boxShadow: {
                'custom-md': "0 4px 15px -3px rgb(0 0 0 / 0.1), 0 0 6px -4px rgb(0 0 0 / 0.1)",
                'custom-lg': "0 10px 30px -10px rgb(0 0 0 / 0.1), 0 0 10px -5px rgb(0 0 0 / 0.1)",
                glow: "0 0 .5rem .125rem rgba(0, 0, 0, 0.25)",
            },
            colors: {
                primary: {
                    light: "#4C4FFC",
                    dark: "#7099F3",
                    DEFAULT: "#4C4FFC",
                },
                secondary: {
                    light: "##0A7956",
                    dark: "#14A275",
                    DEFAULT: "#0A7956",
                },
                tertiary: {
                    light: "#25757E",
                    dark: "#30A3AF",
                    DEFAULT: "#25757E",
                },
                info: {
                    light: "#7C3F94",
                    dark: "#C56BE9",
                    DEFAULT: "#7C3F94",
                },
                warning: {
                    light: "#F1C40F",
                    dark: "#F1C40F",
                    DEFAULT: "#F1C40F",
                },
                danger: {
                    DEFAULT: "#C0392A",
                },
                light: {
                    DEFAULT: "#F3F7FA",
                },
                dark: {
                    DEFAULT: "#2F3842",
                },
                white: {
                    DEFAULT: "#FDFDFD",
                    pure: "#FFFFFF",
                },
                black: {
                    DEFAULT: "#0F1012",
                    pure: "#000000",
                },
            },
            container: {
                center: true,
                padding: ".75rem",
                screens: {
                    sm: defaultTheme.screens.sm,
                    md: defaultTheme.screens.md,
                    lg: defaultTheme.screens.lg,
                    xl: defaultTheme.screens.xl,
                    "2xl": defaultTheme.screens["2xl"],
                    "3xl": "1920px"
                },
            },
            fontFamily: {
                sans: [
                    "Lexend Deca",
                    "Be Vietnam Pro",
                    "Poppins",
                    "Inter",
                    "Quicksand",
                    ...defaultTheme.fontFamily.sans,
                ],
                lexend: ["Lexend Deca", ...defaultTheme.fontFamily.sans],
                vietnam: ["Be Vietnam Pro", ...defaultTheme.fontFamily.sans],
                poppins: ["Poppins", ...defaultTheme.fontFamily.sans],
                inter: ["Inter", ...defaultTheme.fontFamily.sans],
                quicksand: ["Quicksand", ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                "2xs": ".625rem",
            },
            opacity: {
                2.5: "0.025",
            },
            screens: {
                "3xl": "1920px",
                xs: "475px",
                "2xs": "375px",
            },
            spacing: {
                4.5: "1.125rem",
                5.5: "1.375rem",
                6.5: "1.625rem",
                7.5: "1.875rem",
                8.5: "2.125rem",
                9.5: "2.375rem",
            },
        },
    },
    plugins: [],
};
