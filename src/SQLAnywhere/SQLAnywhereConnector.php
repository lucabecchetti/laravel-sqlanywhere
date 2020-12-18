<?php namespace Brokenice\LaravelSqlAnywhere\SQLAnywhere;

use Illuminate\Database\Connectors\Connector;
use Illuminate\Database\Connectors\ConnectorInterface;
use \Cagartner\SQLAnywhereClient;

class SQLAnywhereConnector extends Connector implements ConnectorInterface {

	/**
	 * Establish a database connection.
	 *
	 * @param  array  $options
	 * @return PDO
	 */
	public function connect(array $config)
	{
		return $this->createConnection(array(), $config, array());
	}


	/**
	 * Create a new PDO connection.
	 *
	 * @param  array   $config
	 * @param  array   $options
	 * @return SQLAnywhere
	 */
	public function createConnection($dsn, array $config, array $options)
	{
		$autocommit = $config['auto_commit'];
		$persintent = $config['persintent'];


		return new SQLAnywhereClient($this->getDsn($config), $autocommit, $persintent);
	}

	/**
     * Create a DSN string from a configuration.
     *
     * @param  array   $config
     * @return string
     */
	protected function getDsn(array $config)
    {
        // First we will create the basic DSN setup as well as the port if it is in
        // in the configuration options. This will give us the basic DSN we will
        // need to establish the SQLAnywhereClient and return them back for use.
        extract($config);

        // The database name needs to be in the connection string, otherwise it will
        // authenticate to the admin database, which may result in permission errors.
        $dsn = "UID={$username};PWD={$password};DBN={$database};HOST={$host}:{$port}";

        return $dsn;
    }
}
