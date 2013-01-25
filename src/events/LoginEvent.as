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
	
	import valueObjects.User;
	
	public class LoginEvent extends Event
	{
		private var _user:User; // payload
		
		public static const LOGGED_IN:String = "loggedIn";
		
		public function LoginEvent(user:User, bubbles:Boolean=false, cancelable:Boolean=false)
		{
			super(LoginEvent.LOGGED_IN, bubbles, cancelable);
			this.user = user;
			
		}
		
		override public function clone():Event {
			return new LoginEvent(user);
		}
		
		public function get user():User {
			return _user;
		}
		
		public function set user(user:User):void {
			_user = user;
		}
		
	}
}