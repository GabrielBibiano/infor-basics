<?php 

//ADICIONA EMAIL OPTION
if( !function_exists("infor_basics_info_email") ){
  function infor_basics_info_email($content){
    $email_info = get_option('email_empresa');
    echo $content . $email_info ;
  }
}

add_filter('content_infor_basics', 'infor_basics_info_email');

//ADICIONA TELEFONE OPTION
if( !function_exists("infor_basics_info_telefone") ){
  function infor_basics_info_telefone($content){
    $telefone_info = get_option('telefone_empresa');
    echo $content . $telefone_info ;
  }
}

add_filter('content_infor_basics', 'infor_basics_info_telefone');

//ADICIONA ENDEREÇO OPTION
if( !function_exists("infor_basics_info_endereco") ){
  function infor_basics_info_endereco($content){
    $endereco_info = get_option('endereco_empresa');
    echo $content . $endereco_info ;
  }
}

add_filter('content_infor_basics', 'infor_basics_info_endereco');




?> 