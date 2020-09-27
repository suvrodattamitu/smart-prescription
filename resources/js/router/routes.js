import Dashboard from '../pages/Dashboard'

import AddTest from '../pages/medical-tests/AddTest'
import EditTest from '../pages/medical-tests/EditTest'
import AllTests from '../pages/medical-tests/AllTests'

import AddGroup from '../pages/medicine-groups/AddGroup'
import EditGroup from '../pages/medicine-groups/EditGroup'
import AllGroups from '../pages/medicine-groups/AllGroups'

import AddType from '../pages/medicine-type/AddType'
import EditType from '../pages/medicine-type/EditType'
import AllTypes from '../pages/medicine-type/AllTypes'

import AddCompany from '../pages/companies/AddCompany'
import EditCompany from '../pages/companies/EditCompany'
import AllCompanies from '../pages/companies/AllCompanies'

import AddPatient from '../pages/patients/AddPatient'
import EditPatient from '../pages/patients/EditPatient'
import AllPatients from '../pages/patients/AllPatients'
import ViewPatient from '../pages/patients/ViewPatient'

import AddMedicine from '../pages/medicines/AddMedicine'
import EditMedicine from '../pages/medicines/EditMedicine'
import AllMedicines from '../pages/medicines/AllMedicines'

import Profile from '../pages/profile/Profile';

import Settings from '../pages/settings/Settings';

import Prescription from '../pages/prescription/Prescription'

import AllPrescriptions from '../pages/prescription/AllPrescriptions'

export const routes = [

	{
		path:'/',
		component:Dashboard,
		meta: {title: 'Dashboard'},

	},

	//medical-tests
	{
		path:'/add-test',
		component:AddTest,
		meta: {title: 'Add Test'},

	},
	{
		path:'/edit-test/:id',
		component:EditTest,
		meta: {title: 'Edit Test'},

	},
	{
		path:'/all-tests',
		component:AllTests,
		meta: {title: 'All Tests'},

	},

	//medical-groups
	{
		path:'/add-group',
		component:AddGroup,
		meta: {title: 'Add Group'},

	},
	{
		path:'/edit-group/:id',
		component:EditGroup,
		meta: {title: 'Edit Group'},

	},
	{
		path:'/all-groups',
		component:AllGroups,
		meta: {title: 'All Groups'},

	},

	//medicine-type
	{
		path:'/add-type',
		component:AddType,
		meta: {title: 'Add Type'},

	},
	{
		path:'/edit-type/:id',
		component:EditType,
		meta: {title: 'Edit Type'},

	},
	{
		path:'/all-types',
		component:AllTypes,
		meta: {title: 'All Types'},

	},

	//companies
	{
		path:'/add-company',
		component:AddCompany,
		meta: {title: 'Add Company'},

	},
	{
		path:'/edit-company/:id',
		component:EditCompany,
		meta: {title: 'Edit Company'},

	},
	{
		path:'/all-companies',
		component:AllCompanies,
		meta: {title: 'All Companies'},

	},

	//patients
	{
		path:'/add-patient',
		component:AddPatient,
		meta: {title: 'Add Patient'},

	},
	{
		path:'/edit-patient/:id',
		component:EditPatient,
		meta: {title: 'Edit Patient'},

	},
	{
		path:'/all-patients',
		component:AllPatients,
		meta: {title: 'All Patients'},

	},
	{
		path:'/view-patient/:id',
		component:ViewPatient,
		meta: {title: 'View Patient'},

	},

	//medicines
	{
		path:'/add-medicine',
		component:AddMedicine,
		meta: {title: 'Add Medicine'},

	},
	{
		path:'/edit-medicine/:id',
		component:EditMedicine,
		meta: {title: 'Edit Medicine'},

	},
	{
		path:'/all-medicines',
		component:AllMedicines,
		meta: {title: 'All Medicines'},

	},

	//profile
	{
		path:'/profile',
		component:Profile,
		meta:{title: 'Profile'}
	},

	//settings
	{
		path:'/settings',
		component:Settings,
		meta: {title: 'Settings'},

	},
	
	//prescription
	{
		path:'/prescribe/:id',
		component:Prescription,
		meta: {title: 'Prescription'},

	},

	//prescription
	{
		path:'/all-prescriptions/:id',
		component:AllPrescriptions,
		meta: {title: 'All Prescriptions'},

	},
	


];