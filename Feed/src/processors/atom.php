<?php
/**
 * File containing the ezcFeedAtom class.
 *
 * @package Feed
 * @version //autogentag//
 * @copyright Copyright (C) 2005-2007 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 * @filesource
 */

/**
 * @package Feed
 * @version //autogentag//
 */
class ezcFeedAtom extends ezcFeedProcessor implements ezcFeedParser
{
    protected $supportedModules = array();

    /**
     * Defines the feed type of this processor.
     */
    const FEED_TYPE = 'rss1';

    /**
     * Creates a new ATOM processor.
     */
    public function __construct()
    {
        $this->feedType = self::FEED_TYPE;
    }

    public function setFeedElement( $element, $value )
    {
    }

    public function setFeedItemElement( ezcFeedItem $item, $element, $value )
    {
    }

    public function getFeedElement( $element )
    {
    }

    public function getFeedItemElement( ezcFeedItem $item, $element )
    {
    }

    public function generate()
    {
    }

    public static function canParse( DOMDocument $xml )
    {
        return false;
    }

    public function parseItem( ezcFeed $feed, DOMElement $item )
    {
    }
 
    public function parse( DOMDocument $xml )
    {
    }
}
?>
