{{R3M}}
{{$register = Package.Raxon.Org.Config:Init:register()}}
{{if(!is.empty($register))}}
{{Package.Raxon.Org.Config:Import:role.system()}}
{{Package.Raxon.Org.Config:Import:config.framework()}}
{{Package.Raxon.Org.Config:Import:config.ramdisk()}}
{{Package.Raxon.Org.Config:Import:config.response()}}
{{Package.Raxon.Org.Config:Import:config.service()}}
{{Package.Raxon.Org.Config:Import:config()}}
{{Package.Raxon.Org.Config:Import:event()}}
{{/if}}