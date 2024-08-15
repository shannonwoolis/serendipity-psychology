module.exports = {
  mode: 'jit',
  purge: {
    content: ["./_views/**/*.twig", './safelist.txt'],
  },
  theme: {
    screens: {
      "2xs": "375px",
      xs: "480px",
      sm: "600px",
      md: "768px",
      lg: "1024px",
      xl: "1280px",
      "2xl": "1400px",
      "3xl": "1600px",
      "4xl": "1800px",
    },
    fontFamily: {
      sans: ["DM Sans", "sans-serif"],
      heading: ["Poppins", "sans-serif"],
      subheading: ["Great Vibes", "cursive"],
    },
    filter: {
      none: "none",
      grayscale: "grayscale(1)",
    },
    extend: {
      colors: {
        black: '#1F1D33',
        grey: {
          DEFAULT: '#EDF3FA',
          dark: "#C8D5DF",
        },
        primary: {
          pale: "#EDF3FA",
          light: "#7285b5",
          DEFAULT: "#53699F",
          dark: "#42537f",
        },
        secondary: {
          pale: "#E9F3F3",
          light: "#dfeded",
          DEFAULT: "#BFDDDD",
          dark: "#8FC6C6",
          extraDark: "#509e9e",
        },
      },
      spacing: {
        72: "18rem",
        84: "21rem",
        96: "24rem",
        128: "32rem",
      },
      fontSize: {
        '4xs': '0.65rem',
        '3xs': '0.7rem',
        '2xs': '0.75rem',
        xs: '0.8rem',
        sm: '0.875rem',
        base: '0.95rem',
        lg: '1.125rem',
        xl: '1.25rem',
        '2xl': '1.5rem',
        '3xl': '1.875rem',
        '4xl': '2.1rem',
        '5xl': '2.5rem',
        '6xl': '3rem',
        '7xl': '3.5rem',
        '8xl': '4rem',
      },
      borderRadius: {
        '4xl': '8rem',
        '5xl': '16rem',
      },
      scale: {
        '103': '1.03',
      },
      zIndex: {
        "-10": "-10",
        "-20": "-20",
      },
      inset: (theme, { negative }) => ({
        full: "100%",
        "1/2": "50%",
        ...theme("spacing"),
        ...negative(theme("spacing")),
      }),
      maxWidth: (theme) => ({
        ...theme("spacing"),
      }),
      minWidth: (theme) => ({
        ...theme("spacing"),
      }),
      minHeight: (theme) => ({
        ...theme("spacing"),
        25: "25vh",
        50: "50vh",
        75: "75vh",
      }),
      screens: {
        'landscape': {'raw': '(orientation: landscape)'},
      },
    },
  },
  variants: {
    backgroundColor: ['responsive', 'group-hover', 'hover', 'focus', 'group-focus'],
    textColor: ['responsive', 'group-hover', 'hover', 'focus', 'group-focus'],
    padding: ['responsive', 'group-hover', 'hover', 'focus', 'group-focus'],
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
  corePlugins: {
    container: false,
  },
};
