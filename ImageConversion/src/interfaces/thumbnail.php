<?php
/**
 * File containing the ezcImageThumbnailFilters interface.
 *
 * @package ImageConversion
 * @version //autogentag//
 * @copyright Copyright (C) 2005-2007 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 * @filesource
 */

/**
 * This interface has to implemented by ezcImageFilters classes to
 * support thumbnail filters.
 *
 * @see ezcImageHandler
 * @see ezcImageTransformation
 * @see ezcImageFiltersInterface
 *
 * @package ImageConversion
 */
interface ezcImageThumbnailFilters
{
    /**
     * Creates a thumbnail, and crops parts of the given image to fit the range best.
     * This filter creates a thumbnail of the given image. The image is scaled
     * down, keeping the original ratio and keeping the image larger as the
     * given range, if necessary. Overhead for the target range is cropped from
     * both sides equally.
     * 
     * @param int $width  Width of the thumbnail.
     * @param int $height Height of the thumbnail.
     */
    public function croppedThumbnail( $width, $height );

    /**
     * Creates a thumbnail, and fills up the image to fit the given range.
     * This filter creates a thumbnail of the given image. The image is scaled
     * down, keeping the original ratio and scaling the image smaller as the
     * given range, if necessary. Overhead for the target range is filled with the given
     * color on both sides equally.
     *
     * The color is defined by the following array format (integer values 0-255):
     *
     * <code>
     * array( 
     *      0 => <red value>,
     *      1 => <green value>,
     *      2 => <blue value>,
     * );
     * </code>
     * 
     * @param int $width  Width of the thumbnail.
     * @param int $height Height of the thumbnail.
     * @param array $color Fill color.
     * @return void
     */
    public function filledThumbnail( $width, $height, $color = array() );
}

?>
