<?php
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
/**
 * eduTrac SIS Dependency Injection, Wrappers, etc.
 *  
 * @license GPLv3
 * 
 * @since       6.1.13
 * @package     eduTrac SIS
 * @author      Joshua Parker <joshmac3@icloud.com>
 */
$app = \Liten\Liten::getInstance();

include_once(APP_PATH . 'src/Httpful/autoload.php');

$app->inst->singleton('hook', function () {
    return new \app\src\Hooks();
});

$app->inst->singleton('module', function () {
    return new \app\src\Modules();
});

/**
 * Wrapper function for Hooks::apply_filter() and
 * performs a filtering operation on a eduTrac SIS element or event.
 * @see Hooks::apply_filter()
 *
 * Typical use:
 *
 * 		1) Modify a variable if a function is attached to hook 'hook'
 * 		$var = "default value";
 * 		$var = apply_filter( 'hook', $var );
 *
 * 		2) Trigger functions is attached to event 'et_event'
 * 		apply_filter( 'event' );
 *       (see do_action() )
 * 
 * Returns an element which may have been filtered by a filter.
 *
 * @since 6.0.03
 * @param string $hook The name of the the element or action.
 * @param mixed $value The value of the element before filtering.
 * @return mixed
 */
function apply_filter($hook, $value)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->apply_filter($hook, $value);
}

/**
 * Wrapper function for Hooks::add_filter() and
 * registers a filtering function.
 * @see Hooks::add_filter()
 * 
 * Typical use: add_filter('some_hook', 'function_handler_for_hook');
 *
 * @since 6.0.03
 * @param string $hook the name of the eduTrac SIS element to be filtered or eduTrac SIS action to be triggered
 * @param callback $function_to_add the name of the function that is to be called.
 * @param int $priority Used to specify the order in which the functions associated with a particular action are executed (default=10, lower=earlier execution, and functions with the same priority are executed in the order in which they were added to the filter)
 * @param int $accepted_args The number of arguments the function accept (default is the number provided).
 * @return bool
 */
function add_filter($hook, $function_to_add, $priority = 10, $accepted_args = 1)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->add_filter($hook, $function_to_add, $priority, $accepted_args);
}

/**
 * Wrapper function for Hooks::add_action() and
 * hooks a function to a specific action.
 * @see Hooks::add_action()
 *
 * @since 6.0.03
 * @param string $hook
 * @param string $function_to_add
 * @param int $priority
 * @param int $accepted_args
 * @return bool
 */
function add_action($hook, $function_to_add, $priority = 10, $accepted_args = 1)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->add_action($hook, $function_to_add, $priority, $accepted_args);
}

/**
 * Wrapper function for Hooks::remove_action() and
 * removes a function from a specified action hook.
 * @see Hooks::remove_action()
 * 
 * @since 6.0.03
 * @param string $hook The action hook to which the function to be removed is hooked.
 * @param callback $function_to_remove The name of the function which should be removed.
 * @param int $priority The priority of the function (default: 10).
 * @return bool Whether the function is removed.
 */
function remove_action($hook, $function_to_remove, $priority = 10)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->remove_action($hook, $function_to_remove, $priority);
}

/**
 * Wrapper function for Hooks::remove_all_actions() and
 * removes all of the hooks from an action.
 * @see Hooks::remove_all_actions()
 * 
 * @since 6.0.03
 * @param string $hook The action to remove hooks from.
 * @param int $priority The priority number to remove them from.
 * @return bool True when finished.
 */
function remove_all_actions($hook, $priority = false)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->remove_all_actions($hook, $priority);
}

/**
 * Wrapper function for Hooks::apply_filter() and
 * performs a filtering operation on a eduTrac SIS element or event.
 * @see Hooks::apply_filter()
 *
 * Typical use:
 *
 * 		1) Modify a variable if a function is attached to hook 'hook'
 * 		$var = "default value";
 * 		$var = apply_filter( 'hook', $var );
 *
 * 		2) Trigger functions is attached to event 'et_event'
 * 		apply_filter( 'event' );
 *       (see do_action() )
 * 
 * Returns an element which may have been filtered by a filter.
 *
 * @since 6.0.03
 * @param string $hook The name of the the element or action.
 * @param mixed $value The value of the element before filtering.
 * @return mixed
 */


/**
 * Wrapper function for Hooks::do_action() and
 * executes functions hooked on a specific action hook.
 * 
 * @since 6.0.03
 * @param string $hook The name of the action which should be executed.
 * @param mixed $arg Additional arguments passed to functions hooked to the action.
 * @return mixed|null
 */
function do_action($hook, $arg = '')
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->do_action($hook, $arg);
}

/**
 * Wrapper function for Hooks::_call_all_hook() and
 * processes functions hooked to it.
 * @see Hooks::_call_all_hook()
 * 
 * @since 6.0.03
 * @param mixed $args Parameters from the hook that was called.
 * @return mixed
 */
function _call_all_hook($args)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->_call_all_hook($args);
}

/**
 * Wrapper function for Hooks::do_action_array() and
 * processes functions hooked to it.
 * @see Hooks::do_action_array()
 * 
 * @since 6.0.03
 * @param string $hook Execute functions hooked on a specific action hook, specifying arguments in an array.
 * @param mixed $args Arguments supplied to the functions hooked to it.
 * @return mixed|null
 */
function do_action_array($hook, $args)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->do_action_array($hook, $args);
}

/**
 * Wrapper function for Hooks::remove_filter() method and
 * removes a function from a specified filter hook.
 * @see Hooks::remove_filter()
 *
 * This function removes a function attached to a specified filter hook. This
 * method can be used to remove default functions attached to a specific filter
 * hook and possibly replace them with a substitute.
 *
 * To remove a hook, the $function_to_remove and $priority arguments must match
 * when the hook was added.
 *
 * @since 6.0.03
 * @param string $hook The filter hook to which the function to be removed is hooked.
 * @param callback $function_to_remove The name of the function which should be removed.
 * @param int $priority The priority of the function (default: 10).
 * @param int $accepted_args The number of arguments the function accepts (default: 1).
 * @return bool Whether the function was registered as a filter before it was removed.
 */
function remove_filter($hook, $function_to_remove, $priority = 10)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->remove_filter($hook, $function_to_remove, $priority);
}

/**
 * Wrapper function for Hooks::remove_all_filters() method and
 * removes all of the hooks from a filter.
 * @see Hooks::remove_all_filters()
 * 
 * @since 6.0.03
 * @param string $hook The filter to remove hooks from.
 * @param int $priority The priority number to remove.
 * @return bool True when finished.
 */
function remove_all_filters($hook, $priority = false)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->remove_all_filters($hook, $priority);
}

/**
 * Wrapper function for Hooks::has_filter() method and
 * checks if any filter has been registered for a hook.
 * @see Hooks::has_filter()
 *
 * @since 6.0.03
 * @param string $hook The name of the filter hook.
 * @param callback $function_to_check If specified, return the priority of that function on this hook or false if not attached.
 * @return int|bool Optionally returns the priority on that hook for the specified function.
 */
function has_filter($hook, $function_to_check = false)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->has_filter($hook, $function_to_check);
}

/**
 * Wrapper function for Hooks::has_action() method and
 * checks if any action has been registered for a hook.
 * @see Hooks::has_action()
 *
 * @since 6.0.03
 * @param string $hook The name of the action hook.
 * @param callback|bool $function_to_check The callback to check for.
 * @return int|bool
 */
function has_action($hook, $function_to_check = false)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->has_action($hook, $function_to_check);
}

/**
 * Wrapper function for Hooks::maybe_serialize() method and
 * serializes data if needed.
 * @see Hooks::maybe_serialize()
 *
 * @since 6.0.03
 * @param string|array|object $data Data to be serialized.
 * @return mixed
 */
function maybe_serialize($data)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->maybe_serialize($data);
}

/**
 * Wrapper function for Hooks::is_serialized() method and
 * checks value to find if it was serialized.
 * @see Hooks::is_serialized()
 *
 * @since 6.0.03
 * @param string $data Value to check if serialized.
 * @return bool False if not serialized or true if serialized.
 */
function is_serialized($data)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->is_serialized($data);
}

/**
 * Wrapper function for Hooks::maybe_unserialize() method and
 * unserializes value if it is serialized.
 * @see Hooks::maybe_unserialized()
 *
 * @since 6.0.03
 * @param string $original Maybe unserialized original, if is needed.
 * @return mixed Any type of serialized data.
 */
function maybe_unserialize($original)
{
    $app = \Liten\Liten::getInstance();
    return $app->hook->maybe_unserialize($original);
}

/**
 * Returns false.
 * 
 * Apply to filters to return false.
 * 
 * @since 6.1.00
 * @return bool False
 */
function __return_false()
{
    return false;
}

/**
 * Returns true.
 * 
 * Apply to filters to return true.
 * 
 * @since 6.1.00
 * @return bool True
 */
function __return_true()
{
    return true;
}

/**
 * Returns null.
 * 
 * Apply to filters to return null.
 * 
 * @since 6.1.00
 * @return bool NULL
 */
function __return_null()
{
    return null;
}