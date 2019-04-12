# xideral
Es necesario agregar un documento .htaccess para visualizacion con el siguiente formato:

<IfModule mod_rewrite.c>
RewriteEngine on
ErrorDocument 404 http://localhost/vacante_xideral/error/

RewriteCond %{SCRIPT_FILENAME} !-d
RewriteCond %{SCRIPT_FILENAME} !-f


RewriteRule ^(.*)/(.*) index.php?controller=$1&action=$2
</IfModule>


