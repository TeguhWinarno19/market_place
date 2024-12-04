<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','cart', 'email', 'session');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'file', 'security','login');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Model_kategori','Model_toko','Model_barang','Model_alamat','Model_kota', 'Model_user','Model_whistlist','Model_kode','Model_provinsi','Model_invoice','Model_order','Model_chat');