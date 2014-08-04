<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'type' => 'integer',
   'id' => true,
   'columnName' => 'id',
  ));
$metadata->mapField(array(
   'fieldName' => 'firstName',
   'type' => 'string',
   'length' => '45',
   'columnName' => 'firstName',
  ));
$metadata->mapField(array(
   'fieldName' => 'lastName',
   'type' => 'string',
   'length' => '45',
   'columnName' => 'lastName',
  ));
$metadata->mapField(array(
   'fieldName' => 'nickName',
   'type' => 'string',
   'length' => '45',
   'columnName' => 'nickName',
  ));
$metadata->mapField(array(
   'fieldName' => 'email',
   'type' => 'string',
   'length' => '45',
   'columnName' => 'email',
  ));
$metadata->mapField(array(
   'fieldName' => 'password',
   'type' => 'string',
   'length' => 255,
   'columnName' => 'password',
  ));
$metadata->mapField(array(
   'fieldName' => 'birthdate',
   'type' => 'datetime',
   'columnName' => 'birthdate',
  ));
$metadata->mapField(array(
   'fieldName' => 'gender',
   'type' => 'boolean',
   'columnName' => 'gender',
  ));
$metadata->mapField(array(
   'fieldName' => 'avatar',
   'type' => 'string',
   'length' => 255,
   'columnName' => 'avatar',
  ));
$metadata->mapField(array(
   'fieldName' => 'statut',
   'type' => 'string',
   'length' => 255,
   'columnName' => 'statut',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);