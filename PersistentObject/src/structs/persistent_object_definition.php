<?php
/**
 * @version //autogen//
 * @copyright Copyright (C) 2005-2007 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 * @package PersistentObject
 */

/**
 * Main definition of a persistent object.
 *
 * Each persistent object will have exactly one definition. The purpose of
 * the definition is to provide information about how the database table is structured
 * and how it is mapped to the data object.
 *
 * For an elaborate example see {@link ezcPersistentSession}.
 *
 * @package PersistentObject
 * @version //autogen//
 * @mainclass
 */
class ezcPersistentObjectDefinition extends ezcBaseStruct
{
    /**
     * Name of the database table to use.
     *
     * @var string
     */
    public $table = null;

    /**
     * Class-name of the PersistentObject
     *
     * @var string
     */
    public $class = null;

    /**
     * Holds the identifier property.
     *
     * @var ezcPersistentObjectIdProperty
     */
    public $idProperty = null;

    /**
     * The fields of the Persistent Object as an array of ezcPersistentObjectProperty.
     * The key is the name of the persistent object field name.
     *
     * @var array(string=>ezcPersistentObjectProperty)
     */
    public $properties = array();

    /**
     * The fields of the Persistent Object as an array of ezcPersistentObjectProperty.
     * The key is the name of the original database column.
     *
     * @var array(string=>ezcPersistentObjectProperty)
     */
    public $columns = array();

    /**
     * Contains the relations of this object. An array indexed by class names
     * of the related object, assigned to a instance of a class derived from
     * ezcPersistentRelation.
     *
     * @var array(string=>ezcPersistentRelation)
     */
    public $relations = array();

    /**
     * Constructs a new PersistentObjectDefinition.
     *
     * @param string $table The name of the database table to map to.
     * @param string $class The name of the PHP class to map to.
     * @param array $properties The properties of the class. See {@link $properties}
     * @param array $relations The relations of the class. See {@link $relations}
     * @param ezcPersistentObjectIdProperty $idProperty The primary key of the class/table.
     */
    public function __construct( $table = '',
                                 $class = '',
                                 array $properties = array(),
                                 array $relations = array(),
                                 ezcPersistentObjectIdProperty $idProperty = null )
    {
        $this->table = $table;
        $this->class = $class;
        $this->properties = $properties;
        $this->relations = $relations;
        $this->idProperty = $idProperty;
    }

    /**
     * Returns a new instance of this class with the data specified by $array.
     *
     * $array contains all the data members of this class in the form:
     * array('member_name'=>value).
     *
     * __set_state makes this class exportable with var_export.
     * var_export() generates code, that calls this method when it
     * is parsed with PHP.
     *
     * @param array(string=>mixed) $array
     * @return ezcPersistentObjectDefinition
     */
    public static function __set_state( array $array )
    {
        return new ezcPersistentObjectDefinition( $array['table'],
                                                  $array['class'],
                                                  $array['properties'],
                                                  $array['relations'],
                                                  $array['idProperty'] );
    }
}
?>
