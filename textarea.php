<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Auto Resize Textarea in JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="wrapper">
      <h2>Auto Resize Textarea</h2>
      <textarea spellcheck="false" placeholder="Type something here..." required></textarea>
    </div>
    <script>
      const textarea = document.querySelector("textarea");
      textarea.addEventListener("keyup", e =>{
        textarea.style.height = "63px";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
      });
    </script>

  </body>
</html>
