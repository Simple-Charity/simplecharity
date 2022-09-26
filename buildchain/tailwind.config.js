 // module exports
 module.exports = {
  mode: 'jit',
  purge: {
    content: [
      '../cms/templates/**/*.{twig,html}',
      '../src/vue/**/*.{vue,html}',
    ],
    layers: [
      'base',
      'components',
      'utilities',
    ],
    mode: 'layers',
    options: {
    }
  },
  theme: {
    colors: {
      tan: "#dad9cd",
      linen: "#ffffff",
      lightlinen: "#ffffff",
      blue: "#263b4e",
      darkblue: "#1c2c3b",
      red: "#f68e6d",
      yellow: "#efd76f",
      green: "#adc7ac",
      lightgreen: "#e4f3e5",
      lightergreen: "#eef7ea",
      teal: "#66aeb5",
      navy: "#031928",
      deepnavy: "#031828",
      transparent: "transparent",
      pink: "#f1d1cc",
    },
    minHeight: {
      '0': '0',
      '1/4': '25%',
      '1/2': '50%',
      '3/4': '75%',
      'full': '100%',
      'lg':'712px',
    },
    scale: {
      '0': '0',
      '25': '.25',
      '50': '.5',
      '75': '.75',
      '90': '.9',
      '95': '.95',
      '100': '1',
      '105': '1.05',
      '110': '1.1',
      '125': '1.25',
      '150': '1.5',
      '200': '2',
      '300': '3',
    },
    letterSpacing: {
        overlap: '-.13em',
        tightest: '-.075em',
        tighter: '-.05em',
        tight: '-.025em',
        normal: '0',
        wide: '.025em',
        wider: '.15em',
        widest: '.1em',
        widest: '.25em',
    },
    opacity: {
      '10': '.1',
      '75': '.75',
    },
    fontFamily: {
      'sans': ['Maison Neue', 'Helvetica Neue', 'Helvetica', 'Arial', 'sans-serif'],
      'serif': ['Mogan', 'Times', 'serif'],
    },
    extend: {
      width: {
        half: "50%",
        '88':"22rem",
        '92':"23rem",
        '108':"27rem",
        '120':"30rem",
        '140':"34rem",
        '144':"35rem",
        '160':"38rem",
        '200':"42rem",
        '240':"46rem",
        '380':"58rem",
        '42':"10.5rem",
      },
      fontWeight: {
        'semibold': 700,
        'bold': 700,
      },
      screens: {
        'xs':"375px",
      },
      fontSize: {
        "menusmall":".65rem"
      },
      height: {
        "68":"17rem",
        "76":"19rem",
      },
      maxWidth: {
        '120':"30rem",
        'screen-3xl':"2000px",
      },
      padding: {
        '26':"6.5rem",
        '108':"27rem",
        '8.5':"2.125rem"
      },
      zIndex: {
        "75": 75,
        "100": 100
      },
      screens: {
        "xxl": "1400px",
        "max": "1800px",
        "super": "2800px"
      },
      fontSize: {
        'xxs': '.5rem',
        'hero': '7rem',
        'hero-md': '5.5rem',
      },
    },
  },
  variants: {
    extend: {
      transform: ['hover', 'focus'],
    },
  },
  corePlugins: {},
  plugins: [],
};
