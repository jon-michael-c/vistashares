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

/***/ "./scripts/contact-form.js":
/***/ (function(__webpack_module__, __webpack_exports__, __webpack_require__) {

eval("var _Users_jonmichael_Local_Sites_vistashares_app_public_wp_content_themes_vistashares_node_modules_react_refresh_runtime_js__WEBPACK_IMPORTED_MODULE_0___namespace_cache;\n__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _Users_jonmichael_Local_Sites_vistashares_app_public_wp_content_themes_vistashares_node_modules_react_refresh_runtime_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(\"../node_modules/react-refresh/runtime.js\");\n/* provided dependency */ var __react_refresh_utils__ = __webpack_require__(\"../node_modules/@pmmmwh/react-refresh-webpack-plugin/lib/runtime/RefreshUtils.js\");\n\n__webpack_require__.$Refresh$.runtime = /*#__PURE__*/ (_Users_jonmichael_Local_Sites_vistashares_app_public_wp_content_themes_vistashares_node_modules_react_refresh_runtime_js__WEBPACK_IMPORTED_MODULE_0___namespace_cache || (_Users_jonmichael_Local_Sites_vistashares_app_public_wp_content_themes_vistashares_node_modules_react_refresh_runtime_js__WEBPACK_IMPORTED_MODULE_0___namespace_cache = __webpack_require__.t(_Users_jonmichael_Local_Sites_vistashares_app_public_wp_content_themes_vistashares_node_modules_react_refresh_runtime_js__WEBPACK_IMPORTED_MODULE_0__, 2)));\n\njQuery(document).ready(function($) {\n    console.log('contact-form.js loaded ');\n    $('#contact-form').on('submit', function(event) {\n        event.preventDefault();\n        var formData = {\n            action: 'send_contact_email',\n            firstName: $('#first-name').val(),\n            lastName: $('#last-name').val(),\n            email: $('#email').val(),\n            company: $('#company').val(),\n            telephone: $('#telephone').val(),\n            country: $('#country').val(),\n            investorType: $('#investor-type').val(),\n            message: $('#message').val()\n        };\n        $.ajax({\n            type: 'POST',\n            url: ajax_object.ajax_url,\n            data: formData,\n            success: function(response) {\n                if (response.success) {\n                    $('#form-response').html('<p>' + response.data + '</p>');\n                    $('#contact-form')[0].reset();\n                } else {\n                    $('#form-response').html('<p>' + response.data + '</p>');\n                }\n            },\n            error: function(response) {\n                console.log(response);\n                $('#form-response').html('<p>There was an error sending your message. Please try again later.</p>');\n            }\n        });\n    });\n});\n\n\nvar $ReactRefreshModuleId$ = __webpack_require__.$Refresh$.moduleId;\nvar $ReactRefreshCurrentExports$ = __react_refresh_utils__.getModuleExports(\n\t$ReactRefreshModuleId$\n);\n\nfunction $ReactRefreshModuleRuntime$(exports) {\n\tif (true) {\n\t\tvar errorOverlay;\n\t\tif (true) {\n\t\t\terrorOverlay = false;\n\t\t}\n\t\tvar testMode;\n\t\tif (typeof __react_refresh_test__ !== 'undefined') {\n\t\t\ttestMode = __react_refresh_test__;\n\t\t}\n\t\treturn __react_refresh_utils__.executeRuntime(\n\t\t\texports,\n\t\t\t$ReactRefreshModuleId$,\n\t\t\t__webpack_module__.hot,\n\t\t\terrorOverlay,\n\t\t\ttestMode\n\t\t);\n\t}\n}\n\nif (typeof Promise !== 'undefined' && $ReactRefreshCurrentExports$ instanceof Promise) {\n\t$ReactRefreshCurrentExports$.then($ReactRefreshModuleRuntime$);\n} else {\n\t$ReactRefreshModuleRuntime$($ReactRefreshCurrentExports$);\n}\n\n//# sourceURL=webpack://@roots/bud/sage/./scripts/contact-form.js?");

/***/ })

});