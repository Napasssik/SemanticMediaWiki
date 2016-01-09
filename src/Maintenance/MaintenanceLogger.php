<?php

namespace SMW\Maintenance;

use SMW\MediaWiki\ManualEntryLogger;

/**
 * @license GNU GPL v2+
 * @since 2.4
 *
 * @author mwjames
 */
class MaintenanceLogger {

	/**
	 * @var string
	 */
	private $target = '';

	/**
	 * @var ManualEntryLogger
	 */
	private $manualEntryLogger;

	/**
	 * @since 2.4
	 *
	 * @param string $target
	 * @param ManualEntryLogger $manualEntryLogger
	 */
	public function __construct( $target, ManualEntryLogger $manualEntryLogger ) {
		$this->target = $target;
		$this->manualEntryLogger = $manualEntryLogger;
		$this->manualEntryLogger->registerLoggableEventType( 'maintenance' );
	}

	/**
	 * @since 2.4
	 *
	 * @param string $message
	 */
	public function log( $message ) {
		$this->manualEntryLogger->log( 'maintenance', $this->target, $this->target, $message );
	}

}
