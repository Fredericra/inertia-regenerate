const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"inscrire":{"uri":"inscrire","methods":["GET","HEAD"]},"connexion":{"uri":"connexion","methods":["GET","HEAD"]},"store.inscrire":{"uri":"inscrire","methods":["POST"]},"sotre.connexion":{"uri":"connexion","methods":["POST"]},"admin":{"uri":"Admin","methods":["GET","HEAD"]},"store.admin":{"uri":"Admin","methods":["POST"]},"compte":{"uri":"regenerate::ai\/moncompte","methods":["GET","HEAD"]},"ajouter":{"uri":"regenerate::ai\/admin","methods":["POST"]},"efface":{"uri":"regenerate::ai\/efface","methods":["POST"]},"plus":{"uri":"regenerate::ai\/plus","methods":["POST"]},"reponse":{"uri":"regenerate::ai\/reponseadmin","methods":["POST"]},"sortie":{"uri":"regenerate::ai\/sortie\/{id}","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
