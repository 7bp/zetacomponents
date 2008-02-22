<?php
/**
 * File containing the ezcWorkflowSignalSlotPlugin class.
 *
 * @package WorkflowSignalSlotTiein
 * @version //autogen//
 * @copyright Copyright (C) 2005-2008 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */

/**
 * A workflow execution engine plugin that emits signals.
 *
 * @property ezcWorkflowSignalSlotPluginOptions $options
 *
 * @package WorkflowSignalSlotTiein
 * @version //autogen//
 */
class ezcWorkflowSignalSlotPlugin extends ezcWorkflowExecutionPlugin
{
    /**
     * Properties. 
     * 
     * @var array(string=>mixed)
     */
    protected $properties = array();

    /**
     * @var ezcSignalCollection
     */
    protected $signals;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->options = new ezcWorkflowSignalSlotPluginOptions;
    }

    /**
     * @return ezcSignalCollection
     */
    public function signals()
    {
        if ( $this->signals === null )
        {
            $this->signals = new ezcSignalCollection;
        }

        return $this->signals;
    }

    /**
     * Property get access.
     *
     * @throws ezcBasePropertyNotFoundException
     *         If the given property could not be found.
     * @param string $propertyName
     * @ignore
     */
    public function __get( $propertyName )
    {
        if ( $this->__isset( $propertyName ) )
        {
            return $this->properties[$propertyName];
        }
        throw new ezcBasePropertyNotFoundException( $propertyName );
    }

    /**
     * Property set access.
     *
     * @throws ezcBasePropertyNotFoundException
     * @param string $propertyName
     * @param string $propertyValue
     * @ignore
     */
    public function __set( $propertyName, $propertyValue )
    {
        switch ( $propertyName )
        {
            case 'options':
                if ( !( $propertyValue instanceof ezcWorkflowSignalSlotPluginOptions ) )
                {
                    throw new ezcBaseValueException(
                        $propertyName,
                        $propertyValue,
                        'ezcWorkflowSignalSlotPluginOptions'
                    );
                }
                break;
            default:
                throw new ezcBasePropertyNotFoundException( $propertyName );
        }
        $this->properties[$propertyName] = $propertyValue;
    }

    /**
     * Property isset access. 
     * 
     * @param string $propertyName 
     * @return bool
     * @ignore
     */
    public function __isset( $propertyName )
    {
        return array_key_exists( $propertyName, $this->properties );
    }

    /**
     * Called after an execution has been started.
     *
     * @param ezcWorkflowExecution $execution
     */
    public function afterExecutionStarted( ezcWorkflowExecution $execution )
    {
        $this->signals()->emit( $this->options['afterExecutionStarted'], $execution );
    }

    /**
     * Called after an execution has been suspended.
     *
     * @param ezcWorkflowExecution $execution
     */
    public function afterExecutionSuspended( ezcWorkflowExecution $execution )
    {
        $this->signals()->emit( $this->options['afterExecutionSuspended'], $execution );
    }

    /**
     * Called after an execution has been resumed.
     *
     * @param ezcWorkflowExecution $execution
     */
    public function afterExecutionResumed( ezcWorkflowExecution $execution )
    {
        $this->signals()->emit( $this->options['afterExecutionResumed'], $execution );
    }

    /**
     * Called after an execution has been cancelled.
     *
     * @param ezcWorkflowExecution $execution
     */
    public function afterExecutionCancelled( ezcWorkflowExecution $execution )
    {
        $this->signals()->emit( $this->options['afterExecutionCancelled'], $execution );
    }

    /**
     * Called after an execution has successfully ended.
     *
     * @param ezcWorkflowExecution $execution
     */
    public function afterExecutionEnded( ezcWorkflowExecution $execution )
    {
        $this->signals()->emit( $this->options['afterExecutionEnded'], $execution );
    }

    /**
     * Called before a node is activated.
     *
     * @param ezcWorkflowExecution $execution
     * @param ezcWorkflowNode      $node
     * @return bool true, when the node should be activated, false otherwise
     */
    public function beforeNodeActivated( ezcWorkflowExecution $execution, ezcWorkflowNode $node )
    {
        $return = new ezcWorkflowSignalSlotReturnValue;

        $this->signals()->emit( $this->options['beforeNodeActivated'], $execution, $node, $return );

        return $return->value;
    }

    /**
     * Called after a node has been activated.
     *
     * @param ezcWorkflowExecution $execution
     * @param ezcWorkflowNode      $node
     */
    public function afterNodeActivated( ezcWorkflowExecution $execution, ezcWorkflowNode $node )
    {
        $this->signals()->emit( $this->options['afterNodeActivated'], $execution, $node );
    }

    /**
     * Called after a node has been executed.
     *
     * @param ezcWorkflowExecution $execution
     * @param ezcWorkflowNode      $node
     */
    public function afterNodeExecuted( ezcWorkflowExecution $execution, ezcWorkflowNode $node )
    {
        $this->signals()->emit( $this->options['afterNodeExecuted'], $execution, $node );
    }

    /**
     * Called after a service object has been rolled back.
     *
     * @param ezcWorkflowExecution                 $execution
     * @param ezcWorkflowNode                      $node
     * @param ezcWorkflowRollbackableServiceObject $serviceObject
     * @param bool                                 $success
     */
    public function afterRolledBackServiceObject( ezcWorkflowExecution $execution, ezcWorkflowNode $node, ezcWorkflowRollbackableServiceObject $serviceObject, $success )
    {
        $this->signals()->emit( $this->options['afterRolledBackServiceObject'], $execution, $node, $serviceObject, $success );
    }

    /**
     * Called after a new thread has been started.
     *
     * @param ezcWorkflowExecution $execution
     * @param int                  $threadId
     * @param int                  $parentId
     * @param int                  $numSiblings
     */
    public function afterThreadStarted( ezcWorkflowExecution $execution, $threadId, $parentId, $numSiblings )
    {
        $this->signals()->emit( $this->options['afterThreadStarted'], $execution, $threadId, $parentId, $numSiblings );
    }

    /**
     * Called after a thread has ended.
     *
     * @param ezcWorkflowExecution $execution
     * @param int                  $threadId
     */
    public function afterThreadEnded( ezcWorkflowExecution $execution, $threadId )
    {
        $this->signals()->emit( $this->options['afterThreadEnded'], $execution, $threadId );
    }

    /**
     * Called before a variable is set.
     *
     * @param  ezcWorkflowExecution $execution
     * @param  string               $variableName
     * @param  mixed                $value
     * @return mixed the value the variable should be set to
     */
    public function beforeVariableSet( ezcWorkflowExecution $execution, $variableName, $value )
    {
        $return = new ezcWorkflowSignalSlotReturnValue( $value );

        $this->signals()->emit( $this->options['beforeVariableSet'], $execution, $variableName, $value, $return );

        return $return->value;
    }

    /**
     * Called after a variable has been set.
     *
     * @param ezcWorkflowExecution $execution
     * @param string               $variableName
     * @param mixed                $value
     */
    public function afterVariableSet( ezcWorkflowExecution $execution, $variableName, $value )
    {
        $this->signals()->emit( $this->options['afterVariableSet'], $execution, $variableName, $value );
    }

    /**
     * Called before a variable is unset.
     *
     * @param  ezcWorkflowExecution $execution
     * @param  string               $variableName
     * @return bool true, when the variable should be unset, false otherwise
     */
    public function beforeVariableUnset( ezcWorkflowExecution $execution, $variableName )
    {
        $return = new ezcWorkflowSignalSlotReturnValue;

        $this->signals()->emit( $this->options['beforeVariableUnset'], $execution, $variableName, $return );

        return $return->value;
    }

    /**
     * Called after a variable has been unset.
     *
     * @param ezcWorkflowExecution $execution
     * @param string               $variableName
     */
    public function afterVariableUnset( ezcWorkflowExecution $execution, $variableName )
    {
        $this->signals()->emit( $this->options['afterVariableUnset'], $execution, $variableName );
    }
}
?>
