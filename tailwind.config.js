/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    screens: {
      xs: '480px',
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
    },
    fontFamily: {
      Grotesk: ['Grotesk', 'sans-serif'],
      Termina: ['Termina', 'sans-serif'],
    },
    fontSize: {
      xs: [
        '0.75rem',
        {
          lineHeight: '1.25',
          fontWeight: '400',
          letterSpacing: '0.01em',
        },
      ],
      sm: [
        '0.875rem',
        {
          lineHeight: '1.25',
          fontWeight: '400',
          letterSpacing: '0.01em',
        },
      ],
      base: [
        '1rem',
        {
          lineHeight: '1.5',
          fontWeight: '400',
          letterSpacing: '0.01em',
        },
      ],
      md: [
        '1.125rem',
        {
          lineHeight: '1.75',
          fontWeight: '400',
          letterSpacing: '0.01em',
        },
      ],
      lg: [
        '1.3125rem',
        {
          lineHeight: '2',
          fontWeight: '600',
          letterSpacing: '0.01em',
        },
      ],
      xl: [
        '1.5rem',
        {
          lineHeight: '1.5',
          fontWeight: '600',
          letterSpacing: '0.01em',
        },
      ],
      '2xl': [
        '2.625rem',
        {
          lineHeight: '1.52',
          fontWeight: '600',
          letterSpacing: '0.0625rem',
        },
      ],
      '3xl': [
        '3.125rem',
        {
          lineHeight: '1.44',
          fontWeight: '600',
          letterSpacing: '0.01em',
        },
      ],
      mbase: [
        '0.9375rem',
        {
          lineHeight: '1.53',
          fontWeight: '400',
          letterSpacing: '0.01em',
        },
      ],
      m3xl: [
        '1.75rem',
        {
          lineHeight: '1.57',
          fontWeight: '600',
          letterSpacing: '0.01em',
        },
      ],
    },
    extend: {
      colors: {
        midnight: '#0E062D',
        indigo: '#B269FF',
        indigoLight: '#C7A1FF',
        navy: '#0A192F',
        red: '#FF6D6D',
        green: '#6C9A8B',
        orange: '#FF6D00',
        yellow: '#FFD03D',
      }, // Extend Tailwind's default colors
    },
    borderWidth: {
      DEFAULT: '1px',
      2: '2px',
      3: '3px',
      4: '4px',
      6: '6px',
      8: '8px',
      10: '10px',
    },
    borderRadius: {
      0: '0',
      DEFAULT: '8px',
      lg: '24px',
    },
    spacing: {
      px: '1px',
      0: '0',
      0.5: '0.125rem',
      1: '0.25rem',
      1.5: '0.375rem',
      2: '0.5rem',
      2.5: '0.625rem',
      3: '0.75rem',
      3.5: '0.875rem',
      4: '1rem',
      5: '1.25rem',
      6: '1.5rem',
      7: '1.75rem',
      8: '2rem',
      9: '2.25rem',
      10: '2.5rem',
      11: '2.75rem',
      12: '3rem',
      14: '3.5rem',
      16: '4rem',
      20: '5rem',
      24: '6rem',
      28: '7rem',
      32: '8rem',
      36: '9rem',
      40: '10rem',
      44: '11rem',
      48: '12rem',
      52: '13rem',
      56: '14rem',
      60: '15rem',
      64: '16rem',
      72: '18rem',
      80: '20rem',
      96: '24rem',
      100: '30rem',
    },
  },
  plugins: [],
};

export default config;
