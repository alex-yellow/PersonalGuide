namespace PersonalMvc.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class ProductType : DbMigration
    {
        public override void Up()
        {
            RenameColumn(table: "dbo.Products", name: "TypeProductId", newName: "TypeProduct_Id");
            RenameIndex(table: "dbo.Products", name: "IX_TypeProductId", newName: "IX_TypeProduct_Id");
            AddColumn("dbo.Products", "isBigSize", c => c.Boolean(nullable: false));
            AddColumn("dbo.Products", "isMilitary", c => c.Boolean(nullable: false));
            AddColumn("dbo.Products", "isSpecial", c => c.Boolean(nullable: false));
        }
        
        public override void Down()
        {
            DropColumn("dbo.Products", "isSpecial");
            DropColumn("dbo.Products", "isMilitary");
            DropColumn("dbo.Products", "isBigSize");
            RenameIndex(table: "dbo.Products", name: "IX_TypeProduct_Id", newName: "IX_TypeProductId");
            RenameColumn(table: "dbo.Products", name: "TypeProduct_Id", newName: "TypeProductId");
        }
    }
}
