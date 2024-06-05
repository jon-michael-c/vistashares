import domReady from '@roots/sage/client/dom-ready';
import Navbar from './components/Navbar';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  new Navbar('.navbar');
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
