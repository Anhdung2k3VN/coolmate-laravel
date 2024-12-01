<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ isset($title) ? $title : 'Title' }}</title>
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
<link rel="stylesheet" href="{{asset('frontend/asset/css/style.css')}}" />
<script type="module" src="{{asset('frontend/asset/js/script.js')}}"></script>
<!-- <script type="module" src="{{'frontend/asset/js/main.js'}}"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script type="module" src="{{asset('frontend/asset/js/apiprovince.js')}}"></script>