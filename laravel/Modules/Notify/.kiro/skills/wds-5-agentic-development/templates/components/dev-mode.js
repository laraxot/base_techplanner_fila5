
// Make available globally
globalThis.initDevMode = initDevMode;

// Export for use in other scripts
if (typeof globalThis !== 'undefined' && globalThis.exports) {
  globalThis.exports = { initDevMode };
}
