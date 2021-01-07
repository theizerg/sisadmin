<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    private $permissions , $user_permissions;


    public function __construct()
    {
        /*
        set the default permissions
        */
        $this->permissions =  [
                                 /* Usuarios */
                                'VerUsuario',
                                'RegistrarUsuario',
                                'EditarUsuario',
                                'EliminarUsuario',
                                /* Roles */
                                'CrearRol',
                                'VerRol',
                                'EditarRol',
                                'EliminarRol',
                                /* Pagos */
                                'CrearPago',
                                'VerPago',
                                'EditarPago',
                                'EliminarPago',
                                /* Moneda */
                                'VerMoneda',
                                'CrearMoneda',
                                'EditarMoneda',
                                'EliminarMoneda',
                                /* Modalidad de pagos */
                                'VerModalidadPago',
                                'CrearModalidadPago',
                                'EditarModalidadPago',
                                'EliminarModalidadPago',
                                /* Estado de pagos */
                                'VerEstadoPago',
                                'CrearEstadoPago',
                                'EditarEstadoPago',
                                'EliminarEstadoPago',
                                /* Saldo disponible */
                                'VerSaldoDisponible',
                                'CrearSaldoDisponible',
                                'EditarSaldoDisponible',
                                'EliminarSaldoDisponible',
                                /* Fuente de financiamiento */
                                'VerFuenteFinanciamiento',
                                'CrearFuenteFinanciamiento',
                                'EditarFuenteFinanciamiento',
                                'EliminarFuenteFinanciamiento',
                                /* Fuente de financiamiento */
                                'VerRubros',
                                'CrearRubros',
                                'EditarRubros',
                                'EliminarRubros',
                                /* Permisos */
                                'VerPermisos',
                                'CrearPermisos',
                                'EditarPermisos',
                                'EliminarPermisos',
                              ];


        /*
        set the permissions for the user role, by default
        role admin we will assign all the permissions
        */
        $this->user_permissions = [
                                    'RegistrarUsuario',
                                    'CrearRol',
                                    'VerRol',
                                    'CrearPago',
                                    'VerPago',
                                    'VerMoneda',
                                    'CrearMoneda',
                                    'VerModalidadPago',
                                    'CrearModalidadPago',
                                    'VerEstadoPago',
                                    'CrearEstadoPago',
                                    'VerSaldoDisponible',
                                    'CrearSaldoDisponible',
                                    'VerFuenteFinanciamiento',
                                    'CrearFuenteFinanciamiento',
                                    'VerRubros',
                                    'CrearRubros',

                                    ];
        
    }




    public function run()
	  {
    	  // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        foreach ($this->permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo($this->permissions);

        // create the user role and set all user permissions
        $role = Role::create(['name' => 'Usuario']);
        $role->givePermissionTo($this->user_permissions);

    }
}
