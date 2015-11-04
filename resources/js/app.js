
var hljs = require('../../node_modules/highlight.js/lib/highlight.js');

hljs.registerLanguage('json', require('../../node_modules/highlight.js/lib/languages/json.js'));
hljs.registerLanguage('sql', require('../../node_modules/highlight.js/lib/languages/sql'));
hljs.registerLanguage('python', require('../../node_modules/highlight.js/lib/languages/python'));
hljs.registerLanguage('php', require('../../node_modules/highlight.js/lib/languages/php'));
hljs.registerLanguage('nginx', require('../../node_modules/highlight.js/lib/languages/nginx'));
hljs.registerLanguage('makefile', require('../../node_modules/highlight.js/lib/languages/makefile'));
hljs.registerLanguage('less', require('../../node_modules/highlight.js/lib/languages/less'));
hljs.registerLanguage('java', require('../../node_modules/highlight.js/lib/languages/java'));
hljs.registerLanguage('javascript', require('../../node_modules/highlight.js/lib/languages/javascript'));
hljs.registerLanguage('css', require('../../node_modules/highlight.js/lib/languages/css'));
hljs.registerLanguage('bash', require('../../node_modules/highlight.js/lib/languages/bash'));
hljs.registerLanguage('http', require('../../node_modules/highlight.js/lib/languages/http'));

hljs.configure({
	languages: ['bash', 'http']
});

hljs.initHighlighting();

module.exports = window.hljs = hljs;
