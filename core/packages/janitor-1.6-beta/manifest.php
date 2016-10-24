<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'license' => 'You must agree to the License before continuing installation.

Usage of this software is subject to the GPL license. To help you understand
what the GPL licence is and how it affects your ability to use the software, we
have provided the following summary:

The GNU General Public License is a Free Software license.
Like any Free Software license, it grants to you the four following freedoms:-
	The freedom to run the program for any purpose. 
    The freedom to study how the program works and adapt it to your needs. 
    The freedom to redistribute copies so you can help your neighbor.
    The freedom to improve the program and release your improvements to the
    public, so that the whole community benefits.
    
You may exercise the freedoms specified here provided that you comply with
the express conditions of this license. The principal conditions are:-
	
	You must conspicuously and appropriately publish on each copy distributed an
    appropriate copyright notice and disclaimer of warranty and keep intact all the
    notices that refer to this License and to the absence of any warranty; and give
    any other recipients of the Program a copy of the GNU General Public License
    along with the Program. Any translation of the GNU General Public License must
    be accompanied by the GNU General Public License.

    If you modify your copy or copies of the program or any portion of it, or
    develop a program based upon it, you may distribute the resulting work provided
    you do so under the GNU General Public License. Any translation of the GNU
    General Public License must be accompanied by the GNU General Public License.

    If you copy or distribute the program, you must accompany it with the
    complete corresponding machine-readable source code or with a written offer,
    valid for at least three years, to furnish the complete corresponding
    machine-readable source code.

    Any of these conditions can be waived if you get permission from the
    copyright holder.

    Your fair use and other rights are in no way affected by the above.
    
The above is a summary of the GNU General Public License. By proceeding, you
are agreeing to the GNU General Public Licence, not the above. The above is
simply a summary of the GNU General Public Licence, and its accuracy is not
guaranteed. It is strongly recommended you read the <a href="http://www.gnu.org/copyleft/gpl.html">GNU General Public
License</a> in full before proceeding. 
',
    'readme' => '
Janitor component for MODx Revolution

Purpose: Assists in common site maintenance tasks.
Author: S. Hamblett steve.hamblett@linux.com
For: MODx CMS (www.modxcms.com) Revolution
Date: 18/08/2010

Ideas and suggestions contributed by MODx members, Henrik Nielsen, BobRay and charliez

Janitor is licensed under the GPL, 3rd party components however are licensed
seperetely, please see individual 3rd party applications for further details.

See the user guide for further details on how to use this component.


',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '441bab99ca6901e1e72f9c7ff1b07f70',
      'native_key' => 'janitor',
      'filename' => 'modNamespace/cf8e47802fac6738be63a903f2ac0e22.vehicle',
      'namespace' => 'janitor',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMenu',
      'guid' => '2cfaa16c72e043eadcfa1c5f95dd7f54',
      'native_key' => 'janitor',
      'filename' => 'modMenu/dd94253662601d0aa14a6c7c16cf02e2.vehicle',
      'namespace' => 'janitor',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'a9c921f057213c9b60f49dd0610745f4',
      'native_key' => 'maillog-status',
      'filename' => 'modSystemSetting/d99f8cdf3828f2c8e184585e6f08ebd9.vehicle',
      'namespace' => 'janitor',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '25283b096ed76bb315e3c08f9db76455',
      'native_key' => 'maillog-account',
      'filename' => 'modSystemSetting/82e9ae814ff1416eeadc3b0faeb2dc3e.vehicle',
      'namespace' => 'janitor',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '2e3c3d28bfbf0780dc18a8f290dd4ffd',
      'native_key' => NULL,
      'filename' => 'modCategory/82702c168d144ef049c367955fb4dda8.vehicle',
      'namespace' => 'janitor',
    ),
  ),
);