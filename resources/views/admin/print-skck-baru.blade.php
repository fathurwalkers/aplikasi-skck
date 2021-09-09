<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <style>
        @media print {
            .doc {
            display:none; 
            }
        }
      </style>
    <title class="doc">Print</title>
</head>
<body>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
      var myState = {
          pdf: null,
          currentPage: 1,
          zoom: 1
      }
    
      pdfjsLib.getDocument('./my_document.pdf').then((pdf) => {
    
          myState.pdf = pdf;
          render();
      });
      function render() {
          myState.pdf.getPage(myState.currentPage).then((page) => {
        
              var canvas = document.getElementById("pdf_renderer");
              var ctx = canvas.getContext('2d');
    
              var viewport = page.getViewport(myState.zoom);
              canvas.width = viewport.width;
              canvas.height = viewport.height;
        
              page.render({
                  canvasContext: ctx,
                  viewport: viewport
              });
          });
      }
    //   window.print()
  </script>
  </body>
  </html>