/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'light',
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px',
    },
    fontFamily: {
      sans: ['Graphik', 'sans-serif'],
      serif: ['Merriweather', 'serif'],
    },
    colors: {
      green: {
        50: '#e6f5e4',
        100: '#c7e6c1',
        200: '#a7d69e',
        300: '#88c77b',
        400: '#68b758',
        500: '#49a52c',
        600: '#3d8e25',
        700: '#31771e',
        800: '#255f16',
        900: '#19470e',
        950: '#0f3008',
      },
      white: '#ffffff',
      transparent: 'transparent',
      current: 'currentColor',
      purple: '#3f3cbb',
      midnight: '#121063',
      metal: '#565584',
      tahiti: '#3ab7bf',
      silver: '#ecebff',
      bermuda: '#78dcca',
      red: {
        50: '#fef2f2',
        100: '#fee2e2',
        200: '#fecaca',
        300: '#fca5a5',
        400: '#f87171',
        500: '#ef4444',
        600: '#dc2626',
        700: '#b91c1c',
        800: '#991b1b',
        900: '#7f1d1d',
        950: '#450a0a',
      },

    },

    
    
    extend: {
      spacing: {
        '128': '32rem',
        '144': '36rem',
      },
      borderRadius: {
        '4xl': '2rem',
      }
    }
  },
  plugins: [],

}

