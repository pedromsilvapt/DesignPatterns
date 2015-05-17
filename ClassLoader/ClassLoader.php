<?php namespace ClassLoader;

class ClassLoader {
	/** @var bool ClassLoader */
	protected static $instance = false;

	/** @var array */
	protected $prefixes = array();

	/** @var  array */
	protected $suffixes = array();


	/** @return ClassLoader */
	public static function instance () {
		if ( !static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	function __construct () {
		$this->addSuffixes( '.php' );
	}

	public function getSuffixes () {
		return $this->suffixes;
	}

	public function setSuffixes ( array $suffixes ) {
		$this->suffixes = $suffixes;
	}

	public function addSuffixes ( $suffixes ) {
		if ( is_string( $suffixes ) ) {
			$suffixes = array( $suffixes );
		}

		foreach ( $suffixes as $suffix ) {
			$this->suffixes[] = $suffix;
		}
	}

	/**
	 * @param string $prefix
	 *
	 * @return bool
	 */
	public function hasPrefix ( $prefix ) {
		return isset( $this->prefixes[ $prefix ] );
	}

	/**
	 * Adds a prefix that will be used when trying to load a unloaded class
	 *
	 * @param string             $prefix
	 * @param string|ClassLoader $resolver
	 */
	public function addPrefix ( $prefix, $resolver ) {
		if ( !$this->hasPrefix( $prefix ) ) {
			$this->prefixes[ $prefix ] = array();
		}

		$this->prefixes[ $prefix ][ ] = $resolver;
	}

	/**
	 * Tries to load the specified class in the provided folder.
	 *
	 * @param string $folder
	 * @param array  $atoms
	 *
	 * @return bool True if a matching class was found
	 */
	public function loadClassResolver ( $folder, $atoms ) {
		$path = $folder . DIRECTORY_SEPARATOR . implode( DIRECTORY_SEPARATOR, $atoms );

		foreach ( $this->suffixes as $suffix ) {
			if ( file_exists( $path . $suffix ) ) {
				require_once $path . $suffix;

				return true;
			}
		}
		return false;
	}

	/**
	 * Given a prefix and a class, tries to find a resolver that can load it
	 *
	 * @param string $prefix
	 * @param array  $atoms
	 *
	 * @return bool True if a matching class was found
	 */
	public function loadPrefixClass ( $prefix, $atoms ) {
		foreach ( $this->prefixes[ $prefix ] as $resolver ) {
			/** @var ClassLoader $resolver */
			if ( $resolver instanceof static ) {
				$loaded = $resolver->loadClass( implode( '\\', $atoms ) );
			} else {
				$loaded = $this->loadClassResolver( $resolver, $atoms );
			}

			if ( $loaded === true ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @param string $class
	 *
	 * @return bool If the class was found and loaded or not
	 */
	public function loadClass ( $class ) {
		$atoms = explode( '\\', $class );

		$currentPrefix = '';
		$atomsCount = count( $atoms );
		for ( $index = -1; $index < $atomsCount - 1; $index++ ) {
			if ( isset( $atoms[ $index ] ) ) {
				if ( $currentPrefix !== '' ) {
					$currentPrefix .= '\\';
				}

				$currentPrefix = $currentPrefix . $atoms[ $index ];
			}

			if ( $this->hasPrefix( $currentPrefix ) ) {
				$loaded = $this->loadPrefixClass( $currentPrefix, array_slice( $atoms, $index + 1 ) );

				if ( $loaded === true ) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * Registers the autoloader
	 *
	 * @param bool $prepend
	 */
	public function register ( $prepend = false ) {
		spl_autoload_register( array( $this, 'loadClass' ), false, $prepend );
	}

	/**
	 * Unregisters the autoloader
	 */
	public function unregister () {
		spl_autoload_unregister( array( $this, 'loadClass' ) );
	}
}