<?php

namespace App\DB;
use App\DB\DbPdo;

//con il medoto delle factory generiamo la connessione a seconda dei driver
class DbFactory
{
    public static function create(array $options)
    {
        
        if (!array_key_exists('charset', $options)) {
            $options['charset'] = 'utf8';
        }
        //se il dsn è già fornito è inutile calcolarlo
        if (!array_key_exists('dsn', $options)) {
            if (!array_key_exists('driver', $options)) {
                throw  new \InvalidArgumentException('Nessun drive predefinito');
            }
            $dsn = '';
            switch ($options['driver']) {

                case 'mysql':
                case 'oracle':
                case 'mssql':
                    $dsn = $options['driver'] . ':host=' . $options['host'];
                    $dsn .= ';dbname=' . $options['database'] . ';charset=' . $options['charset'];
                    break;
                case 'sqlite':
                    $dsn = 'sqlite:' . $options['database'];
                    break;
                default:
                    throw  new \InvalidArgumentException('Driver non impostato o sconosciuto');
            }
            $options['dsn'] =  $dsn;
        }

        return  DbPdo::getInstance($options);
    } 
    }