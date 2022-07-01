namespace PersonalMvc.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class TypeProduct : DbMigration
    {
        public override void Up()
        {
            RenameTable(name: "dbo.Types", newName: "TypeProducts");
            RenameColumn(table: "dbo.Products", name: "TypeId", newName: "TypeProductId");
            RenameIndex(table: "dbo.Products", name: "IX_TypeId", newName: "IX_TypeProductId");
        }
        
        public override void Down()
        {
            RenameIndex(table: "dbo.Products", name: "IX_TypeProductId", newName: "IX_TypeId");
            RenameColumn(table: "dbo.Products", name: "TypeProductId", newName: "TypeId");
            RenameTable(name: "dbo.TypeProducts", newName: "Types");
        }
    }
}
