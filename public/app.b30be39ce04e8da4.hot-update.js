"use strict";
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
self["webpackHotUpdate_roots_bud_sage"]("app",{

/***/ "./scripts/app.js":
/***/ (function(__webpack_module__, __webpack_exports__, __webpack_require__) {

eval("var _Users_jonmichael_Local_Sites_vistashares_app_public_wp_content_themes_vistashares_node_modules_react_refresh_runtime_js__WEBPACK_IMPORTED_MODULE_0___namespace_cache;\n__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _Users_jonmichael_Local_Sites_vistashares_app_public_wp_content_themes_vistashares_node_modules_react_refresh_runtime_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(\"../node_modules/react-refresh/runtime.js\");\n/* harmony import */ var _roots_sage_client_dom_ready__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(\"../node_modules/@roots/sage/lib/client/dom-ready.js\");\n/* harmony import */ var _components_Navbar__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(\"./scripts/components/Navbar.js\");\n/* provided dependency */ var __react_refresh_utils__ = __webpack_require__(\"../node_modules/@pmmmwh/react-refresh-webpack-plugin/lib/runtime/RefreshUtils.js\");\n\n__webpack_require__.$Refresh$.runtime = /*#__PURE__*/ (_Users_jonmichael_Local_Sites_vistashares_app_public_wp_content_themes_vistashares_node_modules_react_refresh_runtime_js__WEBPACK_IMPORTED_MODULE_0___namespace_cache || (_Users_jonmichael_Local_Sites_vistashares_app_public_wp_content_themes_vistashares_node_modules_react_refresh_runtime_js__WEBPACK_IMPORTED_MODULE_0___namespace_cache = __webpack_require__.t(_Users_jonmichael_Local_Sites_vistashares_app_public_wp_content_themes_vistashares_node_modules_react_refresh_runtime_js__WEBPACK_IMPORTED_MODULE_0__, 2)));\n\n\n\n/**\n * Application entrypoint\n */ (0,_roots_sage_client_dom_ready__WEBPACK_IMPORTED_MODULE_1__[\"default\"])(async ()=>{\n    new _components_Navbar__WEBPACK_IMPORTED_MODULE_2__[\"default\"]('.navbar');\n    const faqItems = document.querySelectorAll('.faq-item');\n    faqItems.forEach((item)=>{\n        const question = item.querySelector('.faq-q');\n        const answer = item.querySelector('.faq-a');\n        // Initially, set maxHeight to 0 for all answers and handle padding with CSS\n        answer.style.maxHeight = '0px';\n        answer.style.overflow = 'hidden';\n        question.addEventListener('click', function() {\n            if (item.classList.contains('active')) {\n                // Collapse the answer if it's already open\n                answer.style.maxHeight = '0px';\n                item.classList.remove('active');\n            } else {\n                // Close all other open items\n                faqItems.forEach((otherItem)=>{\n                    if (otherItem !== item && otherItem.classList.contains('active')) {\n                        const otherAnswer = otherItem.querySelector('.faq-a');\n                        otherAnswer.style.maxHeight = '0px';\n                        otherItem.classList.remove('active');\n                    }\n                });\n                // Expand the clicked item\n                item.classList.add('active');\n                // Calculate the height of the content inside the answer, including padding\n                const fullHeight = answer.scrollHeight + 'px';\n                // Apply the calculated height to maxHeight\n                answer.style.maxHeight = fullHeight;\n            }\n        });\n    });\n});\n/**\n * @see {@link https://webpack.js.org/api/hot-module-replacement/}\n */ if (true) __webpack_module__.hot.accept(console.error);\n\n\nvar $ReactRefreshModuleId$ = __webpack_require__.$Refresh$.moduleId;\nvar $ReactRefreshCurrentExports$ = __react_refresh_utils__.getModuleExports(\n\t$ReactRefreshModuleId$\n);\n\nfunction $ReactRefreshModuleRuntime$(exports) {\n\tif (true) {\n\t\tvar errorOverlay;\n\t\tif (true) {\n\t\t\terrorOverlay = false;\n\t\t}\n\t\tvar testMode;\n\t\tif (typeof __react_refresh_test__ !== 'undefined') {\n\t\t\ttestMode = __react_refresh_test__;\n\t\t}\n\t\treturn __react_refresh_utils__.executeRuntime(\n\t\t\texports,\n\t\t\t$ReactRefreshModuleId$,\n\t\t\t__webpack_module__.hot,\n\t\t\terrorOverlay,\n\t\t\ttestMode\n\t\t);\n\t}\n}\n\nif (typeof Promise !== 'undefined' && $ReactRefreshCurrentExports$ instanceof Promise) {\n\t$ReactRefreshCurrentExports$.then($ReactRefreshModuleRuntime$);\n} else {\n\t$ReactRefreshModuleRuntime$($ReactRefreshCurrentExports$);\n}\n\n//# sourceURL=webpack://@roots/bud/sage/./scripts/app.js?");

/***/ })

});