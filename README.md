# SI PDK & JKN

## Deskripsi
deskripsi singkat


## Instalasi
1. Pastikan sudah install web server dan MySQL seperti [XAMPP](https://www.apachefriends.org/download.html)
2. Masuk pada folder "XAMPP\htdocs"
2. Download/clone repo ``git clone https://gitlab.com/puguhjayadi/si-pdk-jkn.git`` 
3. Buat database local di MySQL. Contoh : *si_pdk_jkn* 
4. Buka pada file : *XAMPP/htdocs/si_pdk_jkn/application/config/database.php* ganti dengan konfigurasi database komputer. Contoh :
    ```
    $db['default'] = array(
    	'dsn'	=> '',
    	'hostname' => 'localhost',
    	'username' => 'root',
    	'password' => 'root',
    	'database' => 'si_pdk_jkn',
    	'dbdriver' => 'mysqli',
    	'dbprefix' => '',
    	'pconnect' => FALSE,
    	'db_debug' => (ENVIRONMENT !== 'production'),
    	'cache_on' => FALSE,
    	'cachedir' => '',
    	'char_set' => 'utf8',
    	'dbcollat' => 'utf8_general_ci',
    	'swap_pre' => '',
    	'encrypt' => FALSE,
    	'compress' => FALSE,
    	'stricton' => FALSE,
    	'failover' => array(),
    	'save_queries' => TRUE
    );
    ```
5. Buka browser dan jalankan ``http://localhost/si_pdk_jkn/``
