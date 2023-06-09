## Voyager CO-Admin

### Description

The **"voyager-co-admin"** package is designed specifically for the **Laravel Voyager Admin Panel 1.6**. It enhances the functionality by displaying the permissions granted by the superuser (root or admin) in the Voyager Admin Panel. With this package, if certain roles are given the permissions to create and assign roles, they will be able to grant the same permissions to other roles that they themselves possess.

By utilizing **"voyager-co-admin"**, administrators can have granular control over role management within the Voyager Admin Panel. The package enables a hierarchical role structure where designated roles with the appropriate permissions can create and assign roles to other users, ensuring the seamless delegation of access privileges.

## Installation


> #### Requirement
> Voyager: v1.5+  
> You should fully install the package [Voyager](https://github.com/the-control-group/voyager) before.
---

1. Require the Package:
    ```bash
    composer require sweet1s/voyager-co-admin
    ```
2. Run The Installer:
    ```bash
    php artisan co-admin:install
    ```

## Features

- [x] Display the permissions granted by the superuser (root or admin) in the Voyager Admin Panel.
- [x] Enable a hierarchical role structure where designated roles with the appropriate permissions can create and assign roles to other users.
- [X] Hide roles that should not be visible to other users when editing users.
- [x] Ensure the seamless delegation of access privileges.
- [X] Manage who can give out certain roles and who can't

## Before

In the regular usage of Voyager Admin Panel, when creating a role with limited capabilities, the role will still be able to see all existing permissions.

_Admin Role view_
![BeforeAdmin](./.docs/images/before__admin__view.jpg)
_Moderator role view_
![BeforeModerator](./.docs/images/before__moderator__view.jpg)

## After

With the **"voyager-co-admin"** package, the role will only be able to see the permissions that they themselves possess.

_Admin role view_
![BeforeAdmin](./.docs/images/after__admin__view.jpg)
_Moderator role view_
![BeforeModerator](./.docs/images/after__moderator__view.jpg)




