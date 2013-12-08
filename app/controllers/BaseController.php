<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$layout = Request::ajax() ? 'layouts/ajax' : $this->layout;
            $this->layout = View::make($this->layout);
		}
	}

}