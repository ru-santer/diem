<?php

/**
 * BaseDmGroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $description
 * @property Doctrine_Collection $Users
 * @property Doctrine_Collection $Permissions
 * @property Doctrine_Collection $DmGroupPermission
 * @property Doctrine_Collection $DmUserGroup
 * 
 * @method string              getName()              Returns the current record's "name" value
 * @method string              getDescription()       Returns the current record's "description" value
 * @method Doctrine_Collection getUsers()             Returns the current record's "Users" collection
 * @method Doctrine_Collection getPermissions()       Returns the current record's "Permissions" collection
 * @method Doctrine_Collection getDmGroupPermission() Returns the current record's "DmGroupPermission" collection
 * @method Doctrine_Collection getDmUserGroup()       Returns the current record's "DmUserGroup" collection
 * @method DmGroup             setName()              Sets the current record's "name" value
 * @method DmGroup             setDescription()       Sets the current record's "description" value
 * @method DmGroup             setUsers()             Sets the current record's "Users" collection
 * @method DmGroup             setPermissions()       Sets the current record's "Permissions" collection
 * @method DmGroup             setDmGroupPermission() Sets the current record's "DmGroupPermission" collection
 * @method DmGroup             setDmUserGroup()       Sets the current record's "DmUserGroup" collection
 * 
 * @package    retest
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseDmGroup extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dm_group');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'length' => '255',
             ));
        $this->hasColumn('description', 'string', 1000, array(
             'type' => 'string',
             'length' => '1000',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('DmUser as Users', array(
             'refClass' => 'DmUserGroup',
             'local' => 'dm_group_id',
             'foreign' => 'dm_user_id'));

        $this->hasMany('DmPermission as Permissions', array(
             'refClass' => 'DmGroupPermission',
             'local' => 'dm_group_id',
             'foreign' => 'dm_permission_id'));

        $this->hasMany('DmGroupPermission', array(
             'local' => 'id',
             'foreign' => 'dm_group_id'));

        $this->hasMany('DmUserGroup', array(
             'local' => 'id',
             'foreign' => 'dm_group_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}