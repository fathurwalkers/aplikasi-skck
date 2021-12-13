<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
      <title>Document</title>
      <style>
          *{
              margin: 0;
              padding: 0;
              box-sizing: border-box;
          }
  
          .container{
              padding: 30px;
              line-height: 20px;
              font-family: Arial, Helvetica, sans-serif;
              border: 3px solid rgba(170, 170, 170, 0.397);
              width: 80%;
              margin: auto;
              font-size: 20px;
          }
  
          .data{
              margin-top: 20px;
          }
  
          .title .inggris{
              font-style: italic;
          }
          .question{
              text-decoration: underline;
              display: inline-block;
              margin-left: 50px;
          }
  
          .image{
              width: 500px;
              position: absolute;
              top: 400px;
              left: 30%;
              z-index: -99;
              opacity: .3;
              filter:hue-rotate(190deg);
          }
         table .inggris{
              font-style: italic;
              margin-left: 50px;
              display: block;
          }
          .jawaban{
              color: red;
          }
          .section{
              margin-top: 30px;
          }
          .family{
              margin:10px 0 0 20px ;
          }
  
          .anak,.ayah{
              margin-left: 60px;
          }
  
          .anak .inggris{
              display: inline-block;
          }
  
          ol li{
              margin:20px 0 0 40px;
          }
  
          .daftar{
              margin-left: 20px;
          }
  
          @media only screen and (max-width: 700px) {
              .container{
                  font-size: 14px;
              }
  
              .image{
                  width: 300px ;
                  top: 450px;
                  text-align: center;
                  display: block;
                  margin: auto;
                  left: 28%;
              }
  
              .anak,.ayah{
              margin-left: 40px;
          }
  
          ol li{
              margin:15px 0 0 30px;
          }
      }
  
          @media only screen and (max-width: 600px) {
              .container{
                  font-size: 11px;
                  line-height: 17px;
              }
  
              .image{
                  width: 250px ;
                  text-align: center;
                  display: block;
                  margin: auto;
                  left: 25%;
              }
  
              .daftar{
              margin-left: 10px;
          }
  
          .anak,.ayah{
              margin-left: 30px;
          }
  
      ol li{
              margin:10px 0 0 20px;
          }
      }
  
      @media only screen and (max-width: 400px) {
              .container{
                  font-size: 9px;
                  line-height: 14px;
                  padding: 5px;
              }
  
              .image{
                  top: 400px;
                  width: 220px ;
                  margin: auto;
                  left: 23%;
              }
  
              .anak,.ayah{
              margin-left: 10px;
              }
      }
  
      
      </style>
    <title class="doc">Print</title>
</head>
<body>

    <div class="container">
        <div class="title">
            <p>Yang bertanda tangan dibawah ini :</p>
            <p class="inggris">The undersigned is :</p>
            <img class="image" src="https://1.bp.blogspot.com/-tTwhyGMZzN8/XbLUaezr5_I/AAAAAAAAD_w/xIEHSNLaOCc1aFfgZcel-wEoWFMUfKCpACPcBGAYYCw/s1600/Logo%2BBadan%2BIntelkam%2BPolri%2Bhitam-putih.png" alt="">
        </div>
        <div class="data">
            <table>
                <tr>
                    <td class="list">a.</td>
                    <td class="question">Nama</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">name</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">b.</td>
                    <td class="question">Tempat/Tanggal Lahir</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->ttl }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Place/Date of birth</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">c.</td>
                    <td class="question">Agama</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->agama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Religion</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">d.</td>
                    <td class="question">Kebangsaan</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->kebangsaan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Nationality</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">e.</td>
                    <td class="question">Jenis Kelamin</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Male/Female</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">f.</td>
                    <td class="question">Kawin/Tidak kawin</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->status_kawin }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Married/Not maried</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">g.</td>
                    <td class="question">Pekerjaan</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->pekerjaan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Occupation</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">h.</td>
                    <td class="question">Alamat</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->alamat_lengkap }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Current Address</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">i.</td>
                    <td class="question">No.Kartu Penduduk</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->no_ktp }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Citizen card number</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">j.</td>
                    <td class="question">Nomor Passport</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->no_passport }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Passport number</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">k.</td>
                    <td class="question">No KITAS/KITAP</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->no_kitaskitap }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Stay Permit No.</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">l.</td>
                    <td class="question">Nomor Telp/ HP</td>
                    <td class="titik">:</td>
                    <td  class="jawaban">{{ $detail->no_telepon }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Phone Number</td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="section">
            <p>Menerangkan hal-hal sebagai jawaban / keteranganan atas pernyataan pernyataan diajukan sebagai berikut : </p>
            <p class="inggris"><em>Explain Things as answer/ explanation for the question possed as follows</em></p>
        </div>
        <div class="keluarga">
            <p class="family">Hubungan Kekeluargaan <em>(Relationship)</em></p>
            <ol>

                @switch($detail->status_hubungan)
                    @case('Istri')
                    <li><p class="daftar">Istri/ <s>suami</s> <em>(wife/husband)</em> : </p></li>
                        @break
                    @case('Istri')
                    <li><p class="daftar">Istri/ <s>suami</s> <em>(wife/husband)</em> : </p></li>
                        @break
                @endswitch

                {{-- @if ($detail->status_hubungan == 'Istri')
                <li><p class="daftar">Istri/ <s>suami</s> <em>(wife/husband)</em> : </p></li>
                @else
                    
                @endif --}}


            </ol>

            <table class="anak" rules="none">
                <tr>
                    <td class="list">a.</td>
                    <td class="question">Nama</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->nama_pasangan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">name</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">b.</td>
                    <td class="question">Umur</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->umur_pasangan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Age</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">c.</td>
                    <td class="question">Agama</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->agama_pasangan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Religion</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">d.</td>
                    <td class="question">Pekerjaan</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->pekerjaan_pasangan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Occupation</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">e.</td>
                    <td class="question">Alamat</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->alamat_pasangan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Address</td>
                    <td></td>
                </tr>
            </table>
            <ol start="2">
                <li> <p class="daftar">Bapak Sendiri<em>(Father)</em> : </p></li>
            </ol>
            <table class="ayah">
                <tr>
                    <td class="list">a.</td>
                    <td class="question">Nama</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->nama_ayah }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">name</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">b.</td>
                    <td class="question">Umur</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->umur_ayah }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Age</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="list">c.</td>
                    <td class="question">Agama</td>
                    <td class="titik">:</td>
                    <td class="jawaban">{{ $detail->agama_ayah }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="inggris">Religion</td>
                    <td></td>
                </tr>
                <tr>
            </table>
        </div>
    </div>


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
      window.print()
  </script>
  </body>
  </html>