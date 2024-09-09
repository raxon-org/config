{{R3M}}
{{$register = Package.Raxon.Config:Init:register()}}
{{if(!is.empty($register))}}
{{Package.Raxon.Config:Import:role.system()}}
{{Package.Raxon.Config:Import:config.framework()}}
{{Package.Raxon.Config:Import:config.ramdisk()}}
{{Package.Raxon.Config:Import:config.response()}}
{{Package.Raxon.Config:Import:config.service()}}
{{Package.Raxon.Config:Import:config()}}
{{Package.Raxon.Config:Import:event()}}
{{/if}}