<?php /**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophcioperationdayassessment_dayofoperation".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $medical_history
 * @property string $inr_level
 *
 * The followings are the available model relations:
 */

class OEElementDayOfOperation extends BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophcioperationdayassessment_dayofoperation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, ready_to_go_home, district_nurse_contacted, able_to_instil_drops, leaflet_provided, discharged_home_on_id', 'safe'),
			array('medical_history, inr_level, ready_to_go_home, district_nurse_contacted, able_to_instil_drops, leaflet_provided, preop_checklist_completed, cjd_checklist_completed', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, medical_history, inr_level, preop_checklist_completed, cjd_checklist_completed, ready_to_go_home, district_nurse_contacted, able_to_instil_drops, leaflet_provided', 'safe', 'on' => 'search'),
		);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'discharged_home_on' => array(self::BELONGS_TO, 'OphCiOperationdayassessment_Discharged_Home_On', 'discharged_home_on_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'medical_history' => 'Change of medical history since pre-operative assessment',
			'inr_level' => 'INR level',
			'preop_checklist_completed' => 'Preoperative checklist completed and filed in the notes',
			'cjd_checklist_completed' => 'CJD checklist completed and filed in the notes',
			'ready_to_go_home' => 'Ready to go home',
			'district_nurse_contacted' => 'District nurse contacted',
			'able_to_instil_drops' => 'Able to instil drops',
			'leaflet_provided' => 'Informational leaflet and contact numbers provided',
			'discharged_home_on_id' => 'Discharged home on',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);

$criteria->compare('medical_history', $this->medical_history);
$criteria->compare('inr_level', $this->inr_level);
$criteria->compare('preop_checklist_completed', $this->preop_checklist_completed);
$criteria->compare('cjd_checklist_completed', $this->cjd_checklist_completed);
		
		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
			));
	}

	/**
	 * Set default values for forms on create
	 */
	public function setDefaultOptions()
	{
	}

	protected function beforeSave()
	{
		return parent::beforeSave();
	}

	protected function afterSave()
	{
		return parent::afterSave();
	}

	protected function beforeValidate()
	{
		return parent::beforeValidate();
	}
}
?>
