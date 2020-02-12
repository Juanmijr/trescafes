<!DOCTYPE html>
<html lang="en">
<head>
  <title>Snow Theme - Quill Rich Text Editor</title>
  <meta charset="utf-8">

 
<link rel="canonical" href="https://quilljs.com/standalone/snow/">
<link type="application/atom+xml" rel="alternate" href="https://quilljs.com/feed.xml" title="Quill - Your powerful rich text editor" />  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" />
<link rel="stylesheet" href="css/quill.snow.css" />

<style>
  .standalone-container {
    margin: 50px auto;
    max-width: 720px;
  }
  #snow-container {
    height: 350px;
  }
</style>


</head>
<body>
  
<div class="standalone-container">
  <div id="snow-container"></div>
</div>

  
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

<script src="js/quill.min.js"></script>

<script>
  var quill = new Quill('#snow-container', {
    placeholder: 'Compose an epic...',
    theme: 'snow'
  });
</script>


</body>
</html>
