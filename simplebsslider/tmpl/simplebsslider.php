<?php defined('_JEXEC') or die;

if (!$field->value)
{
	return;
}

// for usecase if this customField is rendered in Blogview - generate uniqueID
$uniqid = uniqid();

// get the folder name in images directory
$value = $field->value;

// read the .jpg from the selected directory

jimport('joomla.filesystem.folder');
$filter = '.\.jpg$';
$images = JFolder::files('images/' . $value);

// Bootstrap 4 Carousel

?>

	<div id="simpleBsSliderIndicators-<?php echo $uniqid; ?>" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php foreach ($images as $i => $image) : ?>
			<li data-target = "#simpleBsSliderIndicators-<?php echo $uniqid; ?>"
			    data-slide-to = "<?php echo $i; ?>" class="<?php echo $i <= 0 ? 'active' : ''; ?>"></li >
			<?php endforeach; ?>

		</ol>
		<div class="carousel-inner" role="listbox">
			<?php	foreach ($images as $i => $image) :	?>
				<div class="carousel-item <?php echo $i <= 0 ? 'active' : ''; ?>">
					<?php echo JHtml::_('image', 'images/' . $value . '/' . $image, JText::_("PLG_FIELDS_SIMPLEBSSLIDER_IMAGE_ALT_PREFIX") . " " . $image, array('class' => 'd-block img-fluid', 'title' => $image) , false); ?>
				</div>
				<?php endforeach;?>

		</div>
		<a class="carousel-control-prev" href="#simpleBsSliderIndicators-<?php echo $uniqid; ?>" role="button"
		   data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only"><?php echo JText::_("PLG_FIELDS_SIMPLEBSSLIDER_PREVIOUS"); ?></span>
		</a>
		<a class="carousel-control-next" href="#simpleBsSliderIndicators-<?php echo $uniqid; ?>" role="button"
		   data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only"><?php echo JText::_("PLG_FIELDS_SIMPLEBSSLIDER_NEXT"); ?></span>
		</a>
	</div>








