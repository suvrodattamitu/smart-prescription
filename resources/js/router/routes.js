import Dashboard from '../pages/Dashboard'

import AddTest from '../pages/medical-tests/AddTest'
import EditTest from '../pages/medical-tests/EditTest'
import AllTests from '../pages/medical-tests/AllTests'

import AddGroup from '../pages/medicine-groups/AddGroup'
import EditGroup from '../pages/medicine-groups/EditGroup'
import AllGroups from '../pages/medicine-groups/AllGroups'

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
		meta: {title: 'All Group'},

	},


];