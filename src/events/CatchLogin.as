// ActionScript file
/**
 * KNOLSKAPE SOLUTIONS Confidential
 *
 * Copyright 2012. All rights reserved.
 *
 * Author: Admin 
 * Project: FlexTraining
 * File name: LoginEvent.as
 * Creation Date: Jan 21, 2013
 **/
package events
{
	import flash.events.Event;
	
	//import valueObjects.User;
	
	public class CatchLogin extends Event
	{
		public var currentStateString:String; // payload
		
		public static const CATCH_LOGIN:String = "catchLogin";
		
		public function CatchLogin(currentStateString:String, bubbles:Boolean=false, cancelable:Boolean=false)
		{
			super(CatchLogin.CATCH_LOGIN, bubbles, cancelable);
			//this.user = user;
			this.currentStateString = currentStateString;
			
		}
		
		override public function clone():Event {
			return new CatchLogin(currentStateString);
		}
	}
}