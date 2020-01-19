<?php
/**
 * HTTP API: WP_HTTP_Response class
 *
 * @package WordPress
 * @subpackage HTTP
 * @since 4.4.0
 */

/**
 * Core class used to prepare HTTP responses.
 *
 * @since 4.4.0
 */
class WP_HTTP_Response
{

    /**
     * Response data.
     *
     * @since 4.4.0
     * @var mixed
     */
    public $data;

    /**
     * Response headers.
     *
     * @since 4.4.0
     * @var array
     */
    public $headers;

    /**
     * Response status.
     *
     * @since 4.4.0
     * @var int
     */
    public $status;

    /**
     * Constructor.
     *
     * @param mixed $data Response data. Default null.
     * @param int $status Optional. HTTP status code. Default 200.
     * @param array $headers Optional. HTTP header map. Default empty array.
     * @since 4.4.0
     *
     */
    public function __construct($data = null, $status = 200, $headers = array())
    {
        $this->set_data($data);
        $this->set_status($status);
        $this->set_headers($headers);
    }

    /**
     * Retrieves headers associated with the response.
     *
     * @return array Map of header name to header value.
     * @since 4.4.0
     *
     */
    public function get_headers()
    {
        return $this->headers;
    }

    /**
     * Sets all header values.
     *
     * @param array $headers Map of header name to header value.
     * @since 4.4.0
     *
     */
    public function set_headers($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Sets a single HTTP header.
     *
     * @param string $key Header name.
     * @param string $value Header value.
     * @param bool $replace Optional. Whether to replace an existing header of the same name.
     *                        Default true.
     * @since 4.4.0
     *
     */
    public function header($key, $value, $replace = true)
    {
        if ($replace || !isset($this->headers[$key])) {
            $this->headers[$key] = $value;
        } else {
            $this->headers[$key] .= ', ' . $value;
        }
    }

    /**
     * Retrieves the HTTP return code for the response.
     *
     * @return int The 3-digit HTTP status code.
     * @since 4.4.0
     *
     */
    public function get_status()
    {
        return $this->status;
    }

    /**
     * Sets the 3-digit HTTP status code.
     *
     * @param int $code HTTP status.
     * @since 4.4.0
     *
     */
    public function set_status($code)
    {
        $this->status = absint($code);
    }

    /**
     * Retrieves the response data for JSON serialization.
     *
     * It is expected that in most implementations, this will return the same as get_data(),
     * however this may be different if you want to do custom JSON data handling.
     *
     * @return mixed Any JSON-serializable value.
     * @since 4.4.0
     *
     */
    public function jsonSerialize()
    { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid
        return $this->get_data();
    }

    /**
     * Retrieves the response data.
     *
     * @return mixed Response data.
     * @since 4.4.0
     *
     */
    public function get_data()
    {
        return $this->data;
    }

    /**
     * Sets the response data.
     *
     * @param mixed $data Response data.
     * @since 4.4.0
     *
     */
    public function set_data($data)
    {
        $this->data = $data;
    }
}