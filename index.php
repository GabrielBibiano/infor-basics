
<?php
/*
Plugin Name: Infor Basics
Plugin URI: http://github.com/GabrielBibiano/infor-basics
Description: Plugin para informações básicas da empresa (Endereço, Telefone, Email)
Version: 1.0
Author: Gabriel Bibiano
Author URI: http://gabrielbibiano.github.io
*/

//ADICIONAR PLUGIN AO MENU (ADMIN PAGE)
add_action( 'admin_menu', 'infor_basics_menu' );

//CRIAR ADMIN PAGE
if( !function_exists("infor_basics_menu") ){
    function infor_basics_menu(){

      $page_title = 'Informações Básicas da Empresa';
      $menu_title = 'Infor Basics';
      $capability = 'manage_options';
      $menu_slug  = 'infor_basics';
      $function   = 'infor_basics_page';
      $icon_url   = 'dashicons-media-code';
      $position   = 4;

      add_menu_page( $page_title,
                     $menu_title,
                     $capability,
                     $menu_slug,
                     $function,
                     $icon_url,
                     $position );

      //ACTION PARA EDITAR INFORMAÇOES
      add_action( 'admin_init', 'update_infor_basics' );

    }
}

//CRIAR SETTINGS NO BANCO
if( !function_exists("update_infor_basics") ){
    function update_infor_basics() {
      register_setting( 'infor_basics', 'endereco_empresa' );
      register_setting( 'infor_basics', 'telefone_empresa' );
      register_setting( 'infor_basics', 'email_empresa' );
    }
}

//PÁGINA 
if( !function_exists("infor_basics_page") ){
    function infor_basics_page(){
?>
    <h2>Instruções :D</h2>
    <h3>Para imprimir os dados em seu website chame as seguintes funções:</h3>
    
    <table>
      <tr>
        <td>
          Endereço:
        </td>
        <td>
          <code>endereco_empresa()</code>
        </td>
      </tr>

      <tr>
        <td>
          Telefone:
        </td>
        <td>
          <code>telefone_empresa()</code>
        </td>
      </tr>

      <tr>
        <td>
          Email:
        </td>
        <td>
          <code>email_empresa()</code>
        </td>
      </tr>
    </table>
   
<br>
    <h1>Informações da Empresa</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'infor_basics' ); ?>
        <?php do_settings_sections( 'infor_basics' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Endereço da Empresa:</th>
                <td><input type="text" name="endereco_empresa" value="<?php echo get_option('endereco_empresa'); ?>"/></td>
            </tr>
            
            <tr>
                <th scope="row">Email da Empresa:</th>
                <td><input type="email" name="email_empresa" value="<?php echo get_option('email_empresa'); ?>"/></td>
            </tr>

            <tr>
                <th scope="row">Telefone da Empresa:</th>
                <td><input type="text" name="telefone_empresa" value="<?php echo get_option('telefone_empresa'); ?>"/></td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>

    <table class="form-infor">
      <h2>Informações Atuais</h2>
        <tr valign="top">
            <td scope="row"><strong> Seu Endereço Atual: </strong></td>
            <td><?php echo get_option('endereco_empresa'); ?></td>
        </tr>

        <tr>
            <td scope="row"><strong> Seu Email Atual: </strong></td>
            <td><?php echo get_option('telefone_empresa'); ?></td>
        </tr>

        <tr>
            <td scope="row"><strong> Seu Telefone Atual: </strong></td>
            <td><?php echo get_option('email_empresa'); ?></td>
        </tr>
    </table>
    <?php
    }
}

//CHAMA ENDEREÇO DA EMPRESA
function endereco_empresa(){
    echo get_option('endereco_empresa');
}

//CHAMA EMAIL DA EMPRESA
function email_empresa(){
    echo get_option('email_empresa');
}

//CHAMA TELEFONE DA EMPRESA
function telefone_empresa(){
    echo get_option('telefone_empresa');
}

add_filter('content_infor_basics', 'endereco_empresa');
add_filter('content_infor_basics', 'email_empresa');
add_filter('content_infor_basics', 'telefone_empresa');

