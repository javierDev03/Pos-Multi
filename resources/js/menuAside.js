import {
    mdiAccountCircle,
    mdiMonitor,
    mdiBullhorn,
    mdiDomain,
    mdiShieldCrown,
    mdiViewList,
    mdiViewModule,
    mdiLockCheckOutline,
    mdiAccountSupervisor,
    mdiAccount,
    mdiBook,
    mdiShieldLock,
    mdiFileDocumentCheck,
    mdiReceiptText,
} from "@mdi/js";

/**
 * @param {string[]} userRoles -  array con los nombres de los roles del usuario. E.g., ['revisor', 'editor']
 * @returns {Array} 
 */
export const getMenu = (userRoles = []) => {
    const hasRevisorAndEditorRoles =
        userRoles.includes("Revisor") && userRoles.includes("Editor");

    let articleMenuItem;

    if (hasRevisorAndEditorRoles) {
        // Si tiene ambos roles, creamos un submenú desplegable.
        articleMenuItem = {
            label: "Artículos",
            icon: mdiBook,
            permission: "article.index", // Permiso padre para ver el menú
            menu: [
                {
                    route: "article.diffuse",
                    label: "Artículos para Difundir",
                    icon: mdiBullhorn, 
                    permission: "article.index", 
                },
                {
                    route: "article.qualify",
                    label: "Artículos para Calificar",
                    icon: mdiFileDocumentCheck, 
                    permission: "article.index", 
                },
            ],
        };
    } else {
        // Si no tiene ambos roles, se muestra el enlace simple de siempre.
        articleMenuItem = {
            route: "article.index",
            label: "Artículos",
            icon: mdiBook,
            permission: "article.index",
        };
    }

    const menu = [
        {
            route: "dashboard",
            icon: mdiMonitor,
            label: "Inicio",
            to: "/dashboard",
        },
        {
            route: "profile.edit",
            label: "Perfil",
            icon: mdiAccountCircle,
        },
        {
            label: "Seguridad",
            icon: mdiShieldLock,
            role: "Admin",
            permission: "menu.seguridad",
            menu: [
                {
                    label: "Modulos",
                    route: "module.index",
                    icon: mdiViewModule,
                    permission: "module.index",
                },
                {
                    label: "Permisos",
                    route: "permission.index",
                    icon: mdiLockCheckOutline,
                    permission: "permission.index",
                },
                {
                    label: "Roles",
                    route: "role.index",
                    icon: mdiAccountSupervisor,
                    permission: "role.index",
                },
                {
                    label: "Usuarios",
                    route: "user.index",
                    icon: mdiAccount,
                    permission: "user.index",
                },
            ],
        },
        {
            isDivider: true,
        },
        
      
        
    ];

    return menu;
};