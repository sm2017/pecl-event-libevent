--TEST--
pecl/libevent - bug https://github.com/expressif/pecl-event-libevent/issues/18
--SKIPIF--
<?php
if (!extension_loaded("libevent")) die("skip pecl/libevent needed");
--FILE--
<?php
$base = event_base_new();

// first event reader
$event = event_new();
var_dump(event_set($event, 0, EV_TIMEOUT,function(){
}));

event_base_set($event, $base);
var_dump(event_add($event, 5000000));
event_base_loop($base);

?>
--EXPECTF--
bool(true)
bool(true)
