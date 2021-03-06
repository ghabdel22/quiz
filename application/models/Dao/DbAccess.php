<?php

/**
 * Singleton class
 * Permet à chaque utilisateur d'instancier la connexion à la bd une seule fois
 *
 */
class Application_Model_Dao_DbAccess
{
    /**
     * Call this method to get singleton
     *
     * @return UserFactory
     */
    
    private $config;
    private $db;
    
    public function getConfig()
    {
        return $this->config; 
    }
    
    public function getDb()
    {
       return $this->db;
    }
    
    public static function getInstance()
    {
        static $inst = null;
        if ($inst === null) { 
            $inst = new Application_Model_Dao_DbAccess();
        } 
        return $inst;
    }

    /**
     * Private ctor so nobody else can instance it
     *
     */
    private function __construct()
    {
        $this->config = array(
            'host' => 'SRV7',
            'dbname' => 'QCM',
            'username' => 'sa',
            'password'=>'sadba',
            'adapterNamespace' => 'Application',
            'adapter' => 'sqlsrv'
        );
        $this->db = Zend_Db::factory('SQLSRV', $this->config);
		
	Zend_Db_Table::setDefaultAdapter($this->db);  
		
		//stocke l'adaptateur dans le registre dbAdapter pour être utilisé partout
		//Zend_Registry::set('dbAdapter', $this->db);		
    }
}