<?php
namespace Darya;

use Code;
use Colour;
use Colour\Purple;
use Colour\Salmon;
use Colour\Mustard;
use Colour\SkyBlue;

/**
 * A colourful theme for the Atom text editor.
 *
 * Built with love by,
 * @author Chris Andrew <chris@hexus.io>
 */
class SyntaxTheme implements AwesomeInterface
{
	const AWESOME = 'yep';
	
	/**
	 * @var Colour[]
	 */
	protected $colours;
	
	/**
	 * Instantiate a new Darya Syntax theme.
	 *
	 * @param Purple  $purple
	 * @param Salmon  $salmon
	 * @param Mustard $mustard
	 * @param SkyBlue $skyBlue
	 */
	public function __construct(Purple $purple, Salmon $salmon, Mustard $mustard, SkyBlue $skyBlue)
	{
		foreach (func_get_args() as $colour) {
			if ($colour instanceof Colour) {
				$this->colours[] = $colour;
			}
		}
	}
	
	/**
	 * Highlight the given code.
	 *
	 * @param Code $code
	 * @return Code
	 */
	public function highlight(Code $code)
	{
		foreach ($code->getElements() as $element) {
			$index = rand(0, count($this->colours) - 1);
			$colour = $this->colours[$index];
			$element->setColour($colour);
			$element->string .= "{$colour->getName()}";
		}
	}
}
