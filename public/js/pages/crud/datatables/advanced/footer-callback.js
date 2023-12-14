/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 23);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/metronic/js/pages/crud/datatables/advanced/footer-callback.js":
/*!*********************************************************************************!*\
  !*** ./resources/metronic/js/pages/crud/datatables/advanced/footer-callback.js ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\nvar KTDatatablesAdvancedFooterCalllback = function () {\n  var _init = function init() {\n    var table = $('#kt_datatable'); // begin first table\n\n    table.DataTable({\n      responsive: true,\n      pageLength: 5,\n      lengthMenu: [[2, 5, 10, 15, -1], [2, 5, 10, 15, 'All']],\n      footerCallback: function footerCallback(row, data, start, end, display) {\n        var column = 6;\n        var api = this.api(),\n            data; // Remove the formatting to get integer data for summation\n\n        var intVal = function intVal(i) {\n          return typeof i === 'string' ? i.replace(/[\\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;\n        }; // Total over all pages\n\n\n        var total = api.column(column).data().reduce(function (a, b) {\n          return intVal(a) + intVal(b);\n        }, 0); // Total over this page\n\n        var pageTotal = api.column(column, {\n          page: 'current'\n        }).data().reduce(function (a, b) {\n          return intVal(a) + intVal(b);\n        }, 0); // Update footer\n\n        $(api.column(column).footer()).html('$' + KTUtil.numberString(pageTotal.toFixed(2)) + '<br/> ( $' + KTUtil.numberString(total.toFixed(2)) + ' total)');\n      }\n    });\n  };\n\n  return {\n    //main function to initiate the module\n    init: function init() {\n      _init();\n    }\n  };\n}();\n\njQuery(document).ready(function () {\n  KTDatatablesAdvancedFooterCalllback.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvbWV0cm9uaWMvanMvcGFnZXMvY3J1ZC9kYXRhdGFibGVzL2FkdmFuY2VkL2Zvb3Rlci1jYWxsYmFjay5qcz9kNDcyIl0sIm5hbWVzIjpbIktURGF0YXRhYmxlc0FkdmFuY2VkRm9vdGVyQ2FsbGxiYWNrIiwiaW5pdCIsInRhYmxlIiwiJCIsIkRhdGFUYWJsZSIsInJlc3BvbnNpdmUiLCJwYWdlTGVuZ3RoIiwibGVuZ3RoTWVudSIsImZvb3RlckNhbGxiYWNrIiwicm93IiwiZGF0YSIsInN0YXJ0IiwiZW5kIiwiZGlzcGxheSIsImNvbHVtbiIsImFwaSIsImludFZhbCIsImkiLCJyZXBsYWNlIiwidG90YWwiLCJyZWR1Y2UiLCJhIiwiYiIsInBhZ2VUb3RhbCIsInBhZ2UiLCJmb290ZXIiLCJodG1sIiwiS1RVdGlsIiwibnVtYmVyU3RyaW5nIiwidG9GaXhlZCIsImpRdWVyeSIsImRvY3VtZW50IiwicmVhZHkiXSwibWFwcGluZ3MiOiJBQUFhOztBQUNiLElBQUlBLG1DQUFtQyxHQUFHLFlBQVc7RUFFcEQsSUFBSUMsS0FBSSxHQUFHLFNBQVBBLElBQU8sR0FBVztJQUNyQixJQUFJQyxLQUFLLEdBQUdDLENBQUMsQ0FBQyxlQUFELENBQWIsQ0FEcUIsQ0FHckI7O0lBQ0FELEtBQUssQ0FBQ0UsU0FBTixDQUFnQjtNQUNmQyxVQUFVLEVBQUUsSUFERztNQUVmQyxVQUFVLEVBQUUsQ0FGRztNQUdmQyxVQUFVLEVBQUUsQ0FBQyxDQUFDLENBQUQsRUFBSSxDQUFKLEVBQU8sRUFBUCxFQUFXLEVBQVgsRUFBZSxDQUFDLENBQWhCLENBQUQsRUFBcUIsQ0FBQyxDQUFELEVBQUksQ0FBSixFQUFPLEVBQVAsRUFBVyxFQUFYLEVBQWUsS0FBZixDQUFyQixDQUhHO01BSWZDLGNBQWMsRUFBRSx3QkFBU0MsR0FBVCxFQUFjQyxJQUFkLEVBQW9CQyxLQUFwQixFQUEyQkMsR0FBM0IsRUFBZ0NDLE9BQWhDLEVBQXlDO1FBRXhELElBQUlDLE1BQU0sR0FBRyxDQUFiO1FBQ0EsSUFBSUMsR0FBRyxHQUFHLEtBQUtBLEdBQUwsRUFBVjtRQUFBLElBQXNCTCxJQUF0QixDQUh3RCxDQUt4RDs7UUFDQSxJQUFJTSxNQUFNLEdBQUcsU0FBVEEsTUFBUyxDQUFTQyxDQUFULEVBQVk7VUFDeEIsT0FBTyxPQUFPQSxDQUFQLEtBQWEsUUFBYixHQUF3QkEsQ0FBQyxDQUFDQyxPQUFGLENBQVUsUUFBVixFQUFvQixFQUFwQixJQUEwQixDQUFsRCxHQUFzRCxPQUFPRCxDQUFQLEtBQWEsUUFBYixHQUF3QkEsQ0FBeEIsR0FBNEIsQ0FBekY7UUFDQSxDQUZELENBTndELENBVXhEOzs7UUFDQSxJQUFJRSxLQUFLLEdBQUdKLEdBQUcsQ0FBQ0QsTUFBSixDQUFXQSxNQUFYLEVBQW1CSixJQUFuQixHQUEwQlUsTUFBMUIsQ0FBaUMsVUFBU0MsQ0FBVCxFQUFZQyxDQUFaLEVBQWU7VUFDM0QsT0FBT04sTUFBTSxDQUFDSyxDQUFELENBQU4sR0FBWUwsTUFBTSxDQUFDTSxDQUFELENBQXpCO1FBQ0EsQ0FGVyxFQUVULENBRlMsQ0FBWixDQVh3RCxDQWV4RDs7UUFDQSxJQUFJQyxTQUFTLEdBQUdSLEdBQUcsQ0FBQ0QsTUFBSixDQUFXQSxNQUFYLEVBQW1CO1VBQUNVLElBQUksRUFBRTtRQUFQLENBQW5CLEVBQXNDZCxJQUF0QyxHQUE2Q1UsTUFBN0MsQ0FBb0QsVUFBU0MsQ0FBVCxFQUFZQyxDQUFaLEVBQWU7VUFDbEYsT0FBT04sTUFBTSxDQUFDSyxDQUFELENBQU4sR0FBWUwsTUFBTSxDQUFDTSxDQUFELENBQXpCO1FBQ0EsQ0FGZSxFQUViLENBRmEsQ0FBaEIsQ0FoQndELENBb0J4RDs7UUFDQW5CLENBQUMsQ0FBQ1ksR0FBRyxDQUFDRCxNQUFKLENBQVdBLE1BQVgsRUFBbUJXLE1BQW5CLEVBQUQsQ0FBRCxDQUErQkMsSUFBL0IsQ0FDQyxNQUFNQyxNQUFNLENBQUNDLFlBQVAsQ0FBb0JMLFNBQVMsQ0FBQ00sT0FBVixDQUFrQixDQUFsQixDQUFwQixDQUFOLEdBQWtELFdBQWxELEdBQWdFRixNQUFNLENBQUNDLFlBQVAsQ0FBb0JULEtBQUssQ0FBQ1UsT0FBTixDQUFjLENBQWQsQ0FBcEIsQ0FBaEUsR0FBd0csU0FEekc7TUFHQTtJQTVCYyxDQUFoQjtFQThCQSxDQWxDRDs7RUFvQ0EsT0FBTztJQUVOO0lBQ0E1QixJQUFJLEVBQUUsZ0JBQVc7TUFDaEJBLEtBQUk7SUFDSjtFQUxLLENBQVA7QUFTQSxDQS9DeUMsRUFBMUM7O0FBaURBNkIsTUFBTSxDQUFDQyxRQUFELENBQU4sQ0FBaUJDLEtBQWpCLENBQXVCLFlBQVc7RUFDakNoQyxtQ0FBbUMsQ0FBQ0MsSUFBcEM7QUFDQSxDQUZEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL21ldHJvbmljL2pzL3BhZ2VzL2NydWQvZGF0YXRhYmxlcy9hZHZhbmNlZC9mb290ZXItY2FsbGJhY2suanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxudmFyIEtURGF0YXRhYmxlc0FkdmFuY2VkRm9vdGVyQ2FsbGxiYWNrID0gZnVuY3Rpb24oKSB7XHJcblxyXG5cdHZhciBpbml0ID0gZnVuY3Rpb24oKSB7XHJcblx0XHR2YXIgdGFibGUgPSAkKCcja3RfZGF0YXRhYmxlJyk7XHJcblxyXG5cdFx0Ly8gYmVnaW4gZmlyc3QgdGFibGVcclxuXHRcdHRhYmxlLkRhdGFUYWJsZSh7XHJcblx0XHRcdHJlc3BvbnNpdmU6IHRydWUsXHJcblx0XHRcdHBhZ2VMZW5ndGg6IDUsXHJcblx0XHRcdGxlbmd0aE1lbnU6IFtbMiwgNSwgMTAsIDE1LCAtMV0sIFsyLCA1LCAxMCwgMTUsICdBbGwnXV0sXHJcblx0XHRcdGZvb3RlckNhbGxiYWNrOiBmdW5jdGlvbihyb3csIGRhdGEsIHN0YXJ0LCBlbmQsIGRpc3BsYXkpIHtcclxuXHJcblx0XHRcdFx0dmFyIGNvbHVtbiA9IDY7XHJcblx0XHRcdFx0dmFyIGFwaSA9IHRoaXMuYXBpKCksIGRhdGE7XHJcblxyXG5cdFx0XHRcdC8vIFJlbW92ZSB0aGUgZm9ybWF0dGluZyB0byBnZXQgaW50ZWdlciBkYXRhIGZvciBzdW1tYXRpb25cclxuXHRcdFx0XHR2YXIgaW50VmFsID0gZnVuY3Rpb24oaSkge1xyXG5cdFx0XHRcdFx0cmV0dXJuIHR5cGVvZiBpID09PSAnc3RyaW5nJyA/IGkucmVwbGFjZSgvW1xcJCxdL2csICcnKSAqIDEgOiB0eXBlb2YgaSA9PT0gJ251bWJlcicgPyBpIDogMDtcclxuXHRcdFx0XHR9O1xyXG5cclxuXHRcdFx0XHQvLyBUb3RhbCBvdmVyIGFsbCBwYWdlc1xyXG5cdFx0XHRcdHZhciB0b3RhbCA9IGFwaS5jb2x1bW4oY29sdW1uKS5kYXRhKCkucmVkdWNlKGZ1bmN0aW9uKGEsIGIpIHtcclxuXHRcdFx0XHRcdHJldHVybiBpbnRWYWwoYSkgKyBpbnRWYWwoYik7XHJcblx0XHRcdFx0fSwgMCk7XHJcblxyXG5cdFx0XHRcdC8vIFRvdGFsIG92ZXIgdGhpcyBwYWdlXHJcblx0XHRcdFx0dmFyIHBhZ2VUb3RhbCA9IGFwaS5jb2x1bW4oY29sdW1uLCB7cGFnZTogJ2N1cnJlbnQnfSkuZGF0YSgpLnJlZHVjZShmdW5jdGlvbihhLCBiKSB7XHJcblx0XHRcdFx0XHRyZXR1cm4gaW50VmFsKGEpICsgaW50VmFsKGIpO1xyXG5cdFx0XHRcdH0sIDApO1xyXG5cclxuXHRcdFx0XHQvLyBVcGRhdGUgZm9vdGVyXHJcblx0XHRcdFx0JChhcGkuY29sdW1uKGNvbHVtbikuZm9vdGVyKCkpLmh0bWwoXHJcblx0XHRcdFx0XHQnJCcgKyBLVFV0aWwubnVtYmVyU3RyaW5nKHBhZ2VUb3RhbC50b0ZpeGVkKDIpKSArICc8YnIvPiAoICQnICsgS1RVdGlsLm51bWJlclN0cmluZyh0b3RhbC50b0ZpeGVkKDIpKSArICcgdG90YWwpJyxcclxuXHRcdFx0XHQpO1xyXG5cdFx0XHR9LFxyXG5cdFx0fSk7XHJcblx0fTtcclxuXHJcblx0cmV0dXJuIHtcclxuXHJcblx0XHQvL21haW4gZnVuY3Rpb24gdG8gaW5pdGlhdGUgdGhlIG1vZHVsZVxyXG5cdFx0aW5pdDogZnVuY3Rpb24oKSB7XHJcblx0XHRcdGluaXQoKTtcclxuXHRcdH0sXHJcblxyXG5cdH07XHJcblxyXG59KCk7XHJcblxyXG5qUXVlcnkoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xyXG5cdEtURGF0YXRhYmxlc0FkdmFuY2VkRm9vdGVyQ2FsbGxiYWNrLmluaXQoKTtcclxufSk7XHJcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/metronic/js/pages/crud/datatables/advanced/footer-callback.js\n");

/***/ }),

/***/ 23:
/*!***************************************************************************************!*\
  !*** multi ./resources/metronic/js/pages/crud/datatables/advanced/footer-callback.js ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\Capellan_EMS\resources\metronic\js\pages\crud\datatables\advanced\footer-callback.js */"./resources/metronic/js/pages/crud/datatables/advanced/footer-callback.js");


/***/ })

/******/ });