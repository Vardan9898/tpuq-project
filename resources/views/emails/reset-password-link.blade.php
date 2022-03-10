<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    @include('emails.style')
    <style type="text/css">
        @font-face {
            font-family: 'Roboto';
            font-weight: 400;
            font-style: normal;
            font-display: swap;
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        @font-face {
            font-family: 'Roboto';
            font-weight: 700;
            font-style: normal;
            font-display: swap;
            unicode-range: U+1F00-1FFF;
        }

        @page {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 100px;
            background: #fff;
        }

        * {
            font-family: "Roboto", Verdana, Arial, sans-serif;
        }

        a {
            color: #000000;
            text-decoration: none;
        }

        p {
            line-height: 1.4;
            z-index: 10;
        }

        li {
            text-align: justify;
        }

        .text-justify {
            text-align: justify;
        }

        h1, h2, h3, h4, h5, h6 {
            margin: 0;
            color: #253C61;
            z-index: 10;
        }

        .ol {
            margin-top: 0;
            padding-left: 55px;
            position: relative;
            list-style: none;
        }

        .ol li {
            padding-bottom: 10px;
        }

        .ol li:before {
            position: absolute;
            display: inline;
            /*top:0;*/
            left: 0;
            content: attr(data-num);
        }

        .header-section {
            border-left: 1px solid #6c757d;
            padding: 5px 10px;
        }

        .text-center {
            text-align: center !important;
        }

        .text-black {
            color: black !important;
        }

        .text-right {
            text-align: right !important;
        }

        .float-left {
            float: left !important;
        }

        .clearfix {
            display: block;
            content: "";
            clear: both;
        }

        .content-table {
            width: 100%;
        }

        .contract-title {
            margin-top: 50px;
            margin-bottom: 15px;
        }

        .content-table .dots {
            border-bottom: 4px dotted #000000;
        }

        .footer {
            /*font-size: 16px;*/
            /*color: #b1b8c4;*/
        }

        table.toc {
            width: 110%;
        }

        table.toc .num {
            vertical-align: top;
        }

        table.toc .title {
            white-space: nowrap;
        }

        .z-index-10 {
            z-index: 10;
        }

        table.toc .dots {
            width: 100%;
            text-align: center;
        }

        table.toc .dots span {
            display: block;
            width: 98%;
            margin: 15px auto 0 auto;
            border-top: 3px dotted #000000;
        }

        .page-number:before {
            text-align: right;
            font-size: 20px;
            content: "Seite " counter(page);
            margin-right: 55px;
        }

        .page-break {
            page-break-after: always;
        }

        .page-break-avoid {
            page-break-inside: avoid;
        }

        .subtitle {
            margin-left: 15px;
        }

        .mt-0 {
            margin-top: 0;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .mt-100 {
            margin-top: 100px;
        }

        .mt-150 {
            margin-top: 150px;
        }

        .ml-50 {
            margin-left: 50px;
        }

        .ml-200 {
            margin-left: 200px;
        }

        .ml-300 {
            margin-left: 300px;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .px-40 {
            padding-left: 40px;
            padding-right: 40px;
        }

        .px-30 {
            padding-left: 30px;
            padding-right: 30px;
        }

        .py-20 {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .py-50 {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        @page {
            margin-top: 100px;
        }

        header {
            position: fixed;
            top: -40px;
            left: 100px;
            height: 50px;
        }

        .logo-white-square {
            width: 500px;
            height: 100px;
            background-color: #c52626;
            position: absolute;
            left: 1px;
            top: 1800px;
        }

        .pagination-white-square {
            width: 200px;
            height: 50px;
            background-color: white;
            position: absolute;
            right: 25px;
            bottom: 25px;
        }

        .logo {
            width: 400px;
        }

        .first-page-logo {
            width: 400px;
            position: absolute;
            left: 100px;
            top: -40px;
        }

        .toc-logo {
            width: 400px;
            transform: translateY(-150%);
        }

        table.pdf-footer {
            width: 90%;
            white-space: nowrap;
            font-size: 16px;
            position: absolute;
            bottom: 150px;
            left: 100px;
            color: #746c6c;
        }

        table.pdf-footer th {
            text-align: left;
        }

        .background-text {
            position: absolute;
            top: 700px;
            left: 20%;
            transform: rotate(-45deg);
            font-size: 180px;
            z-index: -1;
            color: rgba(197, 214, 220, 0.5);
            cursor: pointer;
        }

        .background-pagination .background-text {
            top: 40%;
            left: 15%;
            z-index: -100;
        }

    </style>

</head>
<body>
<header>
    <div class="logo">
        <img alt="image" class="logo">
    </div>
</header>
<footer style="position: fixed; bottom: 50px; right: 20px">
    <div class="information footer" style="padding: 0 23px">
        <table>
            <tr>
                <td>
                    <span class="page-number w-100 text-right"></span>
                </td>
            </tr>
        </table>
    </div>
</footer>
<div class="aaa">
    <p class="full">Some text Lorem ipsum dcdcdcccccccccccccccccccdolor sit amet, consectetur adipisicing elit. A architecto commodi corporis delectus distinctio dolores eum, in ipsa ipsum iusto modi mollitia officia placeat quae, qui quidem recusandae vel vitae!</p>
</div>
</body>
</html>
